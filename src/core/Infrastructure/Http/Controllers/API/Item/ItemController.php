<?php

namespace Core\Infrastructure\Http\Controllers\API\Item;

use App\Models\Item;
use Core\Infrastructure\Http\Controllers\API\ApiController;

class ItemController extends ApiController
{
    public function show(Item $item): Item
    {
        $item->load('category');
        $item->price = $item->price?->base ?? 0;
        return $item;
    }
}
