<?php

namespace Core\Infrastructure\Http\Controllers\API\Category;

use Core\Infrastructure\Http\Controllers\API\ApiController;
use Core\Infrastructure\Persistence\Models\Category;
use Illuminate\Contracts\Pagination\Paginator;

class CategoryController extends ApiController
{
    public function index(): Paginator
    {
        return Category::query()->simplePaginate($this->getPerPageValue());
    }
}
