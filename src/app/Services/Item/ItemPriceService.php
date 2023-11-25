<?php

namespace App\Services\Item;

use App\Models\Item;
use App\Models\Point;
use App\Repositories\PriceRepository;

class ItemPriceService
{
    public function __construct(
        private readonly PriceRepository $priceRepository,
    ) {
    }

    public function getItemPriceAtPoint(Item $item, Point $point): float
    {
        $price = $this->priceRepository->lastByItemAndPoint($item, $point);

        return $price ? ($price->manual ?? $price->base) : 0;
    }
}
