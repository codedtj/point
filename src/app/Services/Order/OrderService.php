<?php

namespace App\Services\Order;

use App\Enum\ConsignmentNoteStatus;
use App\Enum\ConsignmentNoteType;
use App\Enum\OrderStatus;
use App\Models\ConsignmentNote;
use App\Models\Order;
use App\Models\Point;
use App\Models\StockBalance;
use App\Services\ConsignmentNote\ConsignmentNoteService;
use Illuminate\Support\Str;

class OrderService
{
    public function __construct(private readonly ConsignmentNoteService $consignmentNoteService)
    {
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

        $pointItems = [];

        foreach ($items as $item) {
            foreach ($points as $point) {
                $allocatedQuantity = 0;

                foreach ($pointItems as $pointItem) {
                    if(isset($pointItem[$item->id])) {
                        $allocatedQuantity += $pointItem[$item->id];
                    }
                }

                $toAllocate = $item->pivot->quantity - $allocatedQuantity;

                if ($toAllocate <= 0) {
                    break;
                }

                /** @var StockBalance $stock */
                $stock = StockBalance::query()
                    ->where('item_id', $item->id)
                    ->where('point_id', $point->id)
                    ->where('quantity', '>', 0)
                    ->first();

                if (!$stock) {
                    continue;
                }

                $diff = $toAllocate - $stock->quantity;

                if ($diff > 0) {
                    $pointItems[$point->id][$item->id] = $stock->quantity;
                } else {
                    $pointItems[$point->id][$item->id] = $toAllocate;
                }
            }
        }

        foreach ($points as $point) {
            if (!isset($pointItems[$point->id])) {
                continue;
            }

            $items = $pointItems[$point->id];

            $lastNumber = ConsignmentNote::query()
                ->select('number')
                ->latest()
                ->first()
                ->number ?? 0;

            $lastNumber++;

            $consignmentNote = $this->consignmentNoteService
                ->create(
                    $point,
                    ConsignmentNoteStatus::Completed,
                    ConsignmentNoteType::Out,
                    $lastNumber
                );

            foreach ($items as $itemId => $quantity) {
                $items[$itemId] = ['quantity' => $quantity, 'price' => $items[$itemId]];

                $consignmentNote->items()->attach($itemId, $items[$itemId]);

                if ($consignmentNote->status === ConsignmentNoteStatus::Completed) {
                    $this->consignmentNoteService
                        ->processItemStockAndPriceChange($consignmentNote);
                }
            }
        }
    }
}
