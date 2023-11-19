<?php

namespace App\Services\ConsignmentNote;

use App\Enum\ConsignmentNoteStatus;
use App\Enum\ConsignmentNoteType;
use App\Models\ConsignmentNote;
use App\Models\Order;
use App\Models\Price;
use App\Models\StockBalance;
use Illuminate\Support\Facades\DB;

class ConsignmentNoteService
{
    public function createFromOrder(Order $order, ConsignmentNoteStatus $status): ConsignmentNote
    {
        /** @var ConsignmentNote */
        return ConsignmentNote::query()->create([
            'point_id' => $order->point_id,
            'status' => $status,
            'type' => ConsignmentNoteType::Out
        ]);
    }

    public function processItemStockAndPriceChange(ConsignmentNote $consignmentNote): void
    {
        foreach ($consignmentNote->items as $item) {
            DB::transaction(fn () => $this->processSingleItem($item, $consignmentNote), 3);
        }
    }

    private function processSingleItem($item, ConsignmentNote $consignmentNote): void
    {
        $balance = $this->updateStockBalance($item, $consignmentNote);
        $this->updatePriceIfNeeded($item);
        $this->finalizeStockBalanceUpdate($balance, $item, $consignmentNote);
    }

    private function updateStockBalance($item, ConsignmentNote $consignmentNote): StockBalance
    {
        /** @var StockBalance */
        return StockBalance::query()->firstOrCreate(
            [
                'item_id' => $item->id,
                'point_id' => $consignmentNote->point_id,
            ],
            [
                'item_id' => $item->id,
                'point_id' => $consignmentNote->point_id,
                'quantity' => 0,
            ]
        );
    }

    private function updatePriceIfNeeded($item): void
    {
        /** @var Price $oldPrice*/
        $oldPrice = Price::query()->where('item_id', $item->id)->first();
        if (!$oldPrice?->manual && $oldPrice?->base !== $item->pivot->price) {
            Price::query()->create([
                'item_id' => $item->id,
                'base' => $item->pivot->price,
            ]);
        }
    }

    private function finalizeStockBalanceUpdate(StockBalance $balance, $item, ConsignmentNote $consignmentNote): void
    {
        $newQuantity = $this->calculateNewQuantity($balance, $item, $consignmentNote);
        $balance->update(['quantity' => $newQuantity]);
    }

    private function calculateNewQuantity(StockBalance $balance, $item, ConsignmentNote $consignmentNote): int
    {
        return match ($consignmentNote->type) {
            ConsignmentNoteType::In => $balance->quantity + $item->pivot->quantity,
            ConsignmentNoteType::Out, ConsignmentNoteType::Transfer => $balance->quantity - $item->pivot->quantity,
        };
    }
}
