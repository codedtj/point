<?php

namespace App\Data\Basket;

use App\Models\Point;

class PointBasketItemCollection
{
    /**
     * @var BasketItem[]
     */
    private array $items = [];

    public function __construct(
        private readonly Point $point,
    ) {
    }

    public function getPoint(): Point
    {
        return $this->point;
    }

    public function addItem(BasketItem $item): void
    {
        $this->items[] = $item;
    }

    public function getBasketItem(string $itemId): ?BasketItem
    {
        foreach ($this->items as $item) {
            if ($item->getItem()->id === $itemId) {
                return $item;
            }
        }

        return null;
    }

    public function getBasketItems(): array
    {
        return $this->items;
    }
}
