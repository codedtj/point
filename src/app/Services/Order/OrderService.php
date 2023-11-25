<?php

namespace App\Services\Order;

use App\Data\Basket\BasketItem;
use App\Data\Basket\PointBasketItemCollection;
use App\Enum\ConsignmentNoteStatus;
use App\Enum\ConsignmentNoteType;
use App\Enum\OrderStatus;
use App\Models\ConsignmentNote;
use App\Models\Item;
use App\Models\Order;
use App\Models\Point;
use App\Models\StockBalance;
use App\Repositories\ConsignmentNoteRepository;
use App\Services\ConsignmentNote\ConsignmentNoteService;
use App\Services\Item\ItemPriceService;
use Illuminate\Support\Str;

class OrderService
{
    public function __construct(
        private readonly ConsignmentNoteService $consignmentNoteService,
        private readonly ConsignmentNoteRepository $consignmentNoteRepository,
        private readonly ItemPriceService $itemPriceService,
    ) {
    }

    public function generateCode(): string
    {
        $timestamp = now()->format('YmdHis');
        $randomString = Str::random(6);

        return "$timestamp$randomString";
    }

    public function changeStatus(Order $order, OrderStatus $status): void
    {
        $order->update([
            'status' => $status,
        ]);

        if ($status === OrderStatus::Completed) {
            $this->createConsignmentNotesForPoints($order);
        }
    }

    private function createConsignmentNotesForPoints(Order $order): void
    {
        $points = Point::all();
        $items = $order->basket->items;

        $pointBasketItemCollections = [];

        foreach ($points as $point) {
            $pointBasketItemCollections[] = new PointBasketItemCollection($point);

            foreach ($items as $item) {
                $currentCollectionIndex = count($pointBasketItemCollections) - 1;

                $allocatedQuantity = $this->countAllocatedQuantity($pointBasketItemCollections, $item);

                $toAllocate = $item->pivot->quantity - $allocatedQuantity;

                if ($toAllocate <= 0) {
                    continue;
                }

                /** @var StockBalance $stock */
                $stock = StockBalance::query()->where('item_id', $item->id)->where('point_id', $point->id)->where(
                        'quantity',
                        '>',
                        0
                    )->first();

                if (!$stock) {
                    continue;
                }

                $diff = $toAllocate - $stock->quantity;

                $price = $this->itemPriceService->getItemPriceAtPoint($item, $point);

                if ($diff > 0) {
                    $pointBasketItemCollections[$currentCollectionIndex]->addItem(
                        new BasketItem($item, $stock->quantity, $price)
                    );
                } else {
                    $pointBasketItemCollections[$currentCollectionIndex]->addItem(
                        new BasketItem($item, $toAllocate, $price)
                    );
                }
            }
        }

        foreach ($pointBasketItemCollections as $collection) {
            if (count($collection->getBasketItems()) === 0) {
                continue;
            }

            $this->createConsignmentNoteForPoint($collection->getPoint(), $collection->getBasketItems());
        }
    }

    /**
     * @param array<BasketItem> $basketItems
     */
    private function createConsignmentNoteForPoint(Point $point, array $basketItems): void
    {
        $lastNumber = ConsignmentNote::query()->select('number')->latest()->first()->number ?? 0;

        $lastNumber++;

        $consignmentNote = $this->consignmentNoteService->create(
            $point,
            ConsignmentNoteStatus::Completed,
            ConsignmentNoteType::Out,
            $lastNumber
        );

        foreach ($basketItems as $basketItem) {
            $this->consignmentNoteRepository->attachItem(
                $consignmentNote,
                $basketItem->getItem(),
                $basketItem->getQuantity(),
                $basketItem->getPrice()
            );

            if ($consignmentNote->status === ConsignmentNoteStatus::Completed) {
                $this->consignmentNoteService->processItemStockAndPriceChange($consignmentNote);
            }
        }
    }

    private function countAllocatedQuantity(array $pointBasketItemCollections, Item $item): int
    {
        $allocatedQuantity = 0;

        foreach ($pointBasketItemCollections as $collection) {
            $basketItem = $collection->getBasketItem($item->id);

            if ($basketItem) {
                $allocatedQuantity += $basketItem->getQuantity();
            }
        }

        return $allocatedQuantity;
    }
}
