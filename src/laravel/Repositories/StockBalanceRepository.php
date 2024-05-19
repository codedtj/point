<?php

namespace App\Repositories;

use Core\Infrastructure\Persistence\Models\Item;
use Core\Infrastructure\Persistence\Models\Point;
use Core\Infrastructure\Persistence\Models\StockBalance;

class StockBalanceRepository
{
    public function firstByItemAndPoint(Item $item, Point $point): ?StockBalance
    {
        /** @var ?StockBalance */
        return StockBalance::query()
            ->where('item_id', $item->id)
            ->where('point_id', $point->id)
            ->first();
    }
}
