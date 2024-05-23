<?php

namespace App\Services\ConsignmentNote;

use App\Services\Item\ItemPriceService;
use Core\Domain\Enums\ConsignmentNoteStatus;
use Core\Domain\Enums\ConsignmentNoteType;
use Core\Infrastructure\Persistence\Models\ConsignmentNote;
use Core\Infrastructure\Persistence\Models\Point;
use Core\Infrastructure\Persistence\Models\StockBalance;
use Illuminate\Support\Facades\DB;

class ConsignmentNoteService
{
    public function __construct(
        private readonly ItemPriceService $itemPriceService,
    ) {
    }

    public function create(
        Point $point,
        ConsignmentNoteStatus $status,
        ConsignmentNoteType $type,
        int $number
    ): ConsignmentNote {
        /** @var ConsignmentNote */
        return ConsignmentNote::query()->create([
            'point_id' => $point->id,
            'status' => $status,
            'type' => $type,
            'number' => $number,
        ]);
    }

    public function processCompletedConsignmentNote(ConsignmentNote $consignmentNote): void
    {
        foreach ($consignmentNote->items as $item) {
            DB::transaction(fn () => $this->processSingleItem($item, $consignmentNote), 3);
        }
    }

    private function processSingleItem($item, ConsignmentNote $consignmentNote): void
    {
        $balance = $this->getStockBalance($item, $consignmentNote);
        $this->updateStockQuantity($balance, $item, $consignmentNote);
    }

    private function getStockBalance($item, ConsignmentNote $consignmentNote): StockBalance
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

    private function updateStockQuantity(StockBalance $balance, $item, ConsignmentNote $consignmentNote): void
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
