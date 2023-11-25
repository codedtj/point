<?php

namespace App\Data\Basket;

use App\Models\Item;

class BasketItem
{
    public function __construct(
        private readonly Item $item,
        private readonly float $quantity,
        private readonly float $price
    ) {
    }

    public function getItem(): Item
    {
        return $this->item;
    }

    public function getQuantity(): float
    {
        return $this->quantity;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
