<?php

namespace Core\Infrastructure\Http\Controllers\API\Point;

use Core\Infrastructure\Http\Controllers\API\ApiController;
use Core\Infrastructure\Persistence\Models\Point;
use Illuminate\Contracts\Pagination\Paginator;

class PointStockBalanceController extends ApiController
{
    public function index(Point $point): Paginator
    {
        return $point->stockBalances()
            ->with('item.category', 'item.price')
            ->simplePaginate($this->getPerPageValue());
    }
}
