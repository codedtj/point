<?php

namespace Core\Infrastructure\Http\Controllers\API\Point;

use App\Models\Point;
use Core\Infrastructure\Http\Controllers\API\ApiController;
use Illuminate\Contracts\Pagination\Paginator;

class PointController extends ApiController
{
    public function index(): Paginator
    {
        return Point::query()->simplePaginate($this->getPerPageValue());
    }
}
