<?php

namespace App\Http\Controllers\API\Category;

use App\Http\Controllers\API\ApiController;
use App\Models\Category;
use Illuminate\Contracts\Pagination\Paginator;

class CategoryController extends ApiController
{
    public function index(): Paginator
    {
        return Category::query()->simplePaginate($this->getPerPageValue());
    }
}
