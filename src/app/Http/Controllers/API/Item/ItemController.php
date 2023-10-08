<?php

namespace App\Http\Controllers\API\Item;

use App\Http\Controllers\API\ApiController;
use App\Models\Item;

class ItemController extends ApiController
{
    public function show(Item $item): Item
    {
        return $item;
    }
}
