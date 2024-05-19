<?php

namespace App\Services\Item;

use App\Models\Item;
use App\Models\Point;
use App\Models\Price;
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

    /**
     * @todo remove? not used?
     */
    public function updatePriceIfChanged(Item $item, Point $point, float $price): void
    {
        $lastPrice = $this->priceRepository->lastByItemAndPoint($item, $point);

        $shouldUpdatePrice = !$lastPrice?->manual && $lastPrice?->base !== $price;

        if ($shouldUpdatePrice) {
            $this->priceRepository->save(
                new Price([
                    'item_id' => $item->id,
                    'point_id' => $point->id,
                    'base' => $price,
                ])
            );
        }
    }
}
