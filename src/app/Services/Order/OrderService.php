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
use App\Repositories\PointRepository;
use App\Repositories\StockBalanceRepository;
use App\Services\ConsignmentNote\ConsignmentNoteService;
use App\Services\Item\ItemPriceService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class OrderService
{
    public function __construct(
        private readonly ConsignmentNoteService $consignmentNoteService,
        private readonly PointRepository $pointRepository,
        private readonly ConsignmentNoteRepository $consignmentNoteRepository,
        private readonly ItemPriceService $itemPriceService,
        private readonly StockBalanceRepository $stockBalanceRepository
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
            $this->processOrderCompletion($order);
        }
    }

    private function processOrderCompletion(Order $order): void
    {
        $points = $this->pointRepository->all();
        $pointBasketItemCollections = $this->allocateItems($points, $order);
        $this->createConsignmentNotes($pointBasketItemCollections);
    }

    /**
     * @return array<PointBasketItemCollection>
     */
    private function allocateItems(Collection $points, Order $order): array
    {
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
                $stock = $this->stockBalanceRepository->firstByItemAndPoint($item, $point);

                if (!$stock || $stock->quantity === 0.0) {
                    continue;
                }

                $price = $this->itemPriceService->getItemPriceAtPoint($item, $point);
                $quantityToAdd = min($toAllocate, $stock->quantity);
                $pointBasketItemCollections[$currentCollectionIndex]->addItem(
                    new BasketItem($item, $quantityToAdd, $price)
                );
            }
        }

        return $pointBasketItemCollections;
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

    /**
     * @param array<PointBasketItemCollection> $pointBasketItemCollections
     */
    private function createConsignmentNotes(array $pointBasketItemCollections): void
    {
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
}
