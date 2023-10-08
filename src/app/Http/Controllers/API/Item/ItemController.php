<?php

namespace App\Http\Controllers\API\Item;

use App\Http\Controllers\API\ApiController;
use App\Models\ConsignmentNote;
use App\Models\Item;

class ItemController extends ApiController
{
    public function show(Item $item): Item
    {
        $item->load('category');
        $item->price = ConsignmentNote::query()->latest()->whereHas('items', function ($query) use ($item) {
            $query->where('item_id', $item->id);
        })->first()->price ?? 0;
        return $item;
    }
}
