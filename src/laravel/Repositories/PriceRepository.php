<?php

namespace App\Repositories;

use Core\Infrastructure\Persistence\Models\Item;
use Core\Infrastructure\Persistence\Models\Point;
use Core\Infrastructure\Persistence\Models\Price;

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

    public function save(Price $price): bool
    {
        return $price->save();
    }
}
