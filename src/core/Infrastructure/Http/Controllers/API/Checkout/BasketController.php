<?php

namespace Core\Infrastructure\Http\Controllers\API\Checkout;

use Core\Domain\Enums\BasketStatus;
use Core\Infrastructure\Http\Controllers\API\ApiController;
use Core\Infrastructure\Persistence\Models\Basket;
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
        return Basket::query()->create(['status' => BasketStatus::Active]);
    }
}
