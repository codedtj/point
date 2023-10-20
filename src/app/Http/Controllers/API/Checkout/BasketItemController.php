<?php

namespace App\Http\Controllers\API\Checkout;

use App\Http\Controllers\API\ApiController;
use App\Models\Basket;
use Illuminate\Database\Eloquent\Collection;

class BasketItemController extends ApiController
{
    public function index(Basket $basket): Collection|array
    {
        return $basket->items()->with('category')->get();
    }

    public function store(Basket $basket): void
    {
        if ($basket->status->editable() === false) {
            abort(403, 'Basket is not editable');
        }

        $basket->items()->attach(
            request()->get('item_id'),
            [
                'quantity' => request()->get('quantity')
            ]
        );
    }

    public function update(Basket $basket, string $itemId): void
    {
        if ($basket->status->editable() === false) {
            abort(403, 'Basket is not editable');
        }

        $basket->items()->updateExistingPivot($itemId, [
            'quantity' => request()->get('quantity')
        ]);
    }
}
