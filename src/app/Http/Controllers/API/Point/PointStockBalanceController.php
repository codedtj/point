<?php

namespace App\Http\Controllers\API\Point;

use App\Http\Controllers\API\ApiController;
use App\Models\Point;
use Illuminate\Contracts\Pagination\Paginator;

class PointStockBalanceController extends ApiController
{
    public function index(Point $point): Paginator
    {
        return $point->stockBalances()->simplePaginate($this->getPerPageValue());
    }
}
