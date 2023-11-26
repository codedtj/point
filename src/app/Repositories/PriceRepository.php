<?php

namespace App\Repositories;

use App\Models\Item;
use App\Models\Point;
use App\Models\Price;

class PriceRepository
{
    public function lastByItemAndPoint(Item $item, Point $point): ?Price
    {
        /** @var ?Price */
        return $item->priceHistory()
            ->where('point_id', $point->id)
            ->latest()
            ->first();
    }
}
