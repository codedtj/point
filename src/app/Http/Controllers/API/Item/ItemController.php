<?php

namespace App\Http\Controllers\API\Item;

use App\Http\Controllers\API\ApiController;
use App\Models\Item;

class ItemController extends ApiController
{
    public function show(Item $item): Item
    {
        $item->load('category');
        $item->price = $item->stockBalances()->latest()->first()->base_price ?? 0;
        return $item;
    }
}
