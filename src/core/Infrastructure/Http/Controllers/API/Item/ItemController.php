<?php

namespace Core\Infrastructure\Http\Controllers\API\Item;

use Core\Infrastructure\Http\Controllers\API\ApiController;
use Core\Infrastructure\Persistence\Models\Item;

class ItemController extends ApiController
{
    public function show(Item $item): Item
    {
        $item->load('category');
        $item->price = $item->price?->base ?? 0;
        return $item;
    }
}
