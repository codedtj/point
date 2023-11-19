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
        /** @var ConsignmentNote $consignmentNote */
        $consignmentNote = ConsignmentNote::query()->create([
            'point_id' => $order->point_id,
            'status' => $status,
            'type' => ConsignmentNoteType::Out
        ]);

        return $consignmentNote;
    }

    public function processItemStockAndPriceChange(ConsignmentNote $consignmentNote): void
    {
        foreach ($consignmentNote->items as $item) {
            DB::transaction(function () use ($item, $consignmentNote) {
                /** @var StockBalance $balance */
                $balance = StockBalance::query()->firstOrCreate(
                        [
                            'item_id' => $item->id,
                            'point_id' => $consignmentNote->point_id,
                        ], [
                            'item_id' => $item->id,
                            'point_id' => $consignmentNote->point_id,
                            'quantity' => 0,
                        ]
                    );

                $newQuantity = match ($consignmentNote->type) {
                    ConsignmentNoteType::In => $balance->quantity + $item->pivot->quantity,
                    ConsignmentNoteType::Out, ConsignmentNoteType::Transfer => $balance->quantity - $item->pivot->quantity,
                };

                /** @var Price $oldPrice */
                $oldPrice = Price::query()->where('item_id', $item->id)->first();

                if (!$oldPrice?->manual && $oldPrice?->base !== $item->pivot->price) {
                    Price::query()->create([
                            'item_id' => $item->id,
                            'base' => $item->pivot->price,
                        ]);
                }

                $balance->update([
                    'quantity' => $newQuantity,
                ]);
            }, 3);
        }
    }
}
