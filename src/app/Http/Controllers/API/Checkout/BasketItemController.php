<?php

namespace App\Http\Controllers\API\Checkout;

use App\Http\Controllers\API\ApiController;
use App\Models\Basket;
use Illuminate\Database\Eloquent\Collection;

class BasketItemController extends ApiController
{
    public function index(): Collection|array
    {
        return Basket::query()->get();
    }

    public function store(Basket $basket): void
    {
        $basket->items()->attach(
            request()->get('item_id'),
            [
                'quantity' => request()->get('quantity')
            ]
        );
    }

    public function update(Basket $basket, string $itemId): void
    {
        $basket->items()->updateExistingPivot($itemId, [
            'quantity' => request()->get('quantity')
        ]);
    }
}
