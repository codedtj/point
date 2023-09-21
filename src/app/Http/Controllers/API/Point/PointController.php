<?php

namespace App\Http\Controllers\API\Point;

use App\Http\Controllers\API\ApiController;
use App\Models\Point;
use Illuminate\Contracts\Pagination\Paginator;

class PointController extends ApiController
{
    public function index(): Paginator
    {
        return Point::query()->simplePaginate($this->getPerPageValue());
    }
}
