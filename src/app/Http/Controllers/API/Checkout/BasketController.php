<?php

namespace App\Http\Controllers\API\Checkout;

use App\Enum\BasketStatus;
use App\Http\Controllers\API\ApiController;
use App\Models\Basket;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;

class BasketController extends ApiController
{
    public function index(): Paginator
    {
        return Basket::query()->simplePaginate($this->getPerPageValue());
    }

    public function show(Basket $basket): Model
    {
        return $basket;
    }

    public function store(): Model
    {
        return Basket::query()->create(['status' => BasketStatus::Draft]);
    }
}
