<?php

namespace App\Repositories;

use App\Models\Item;
use App\Models\Point;
use App\Models\StockBalance;

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
