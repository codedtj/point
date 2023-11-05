<?php

namespace App\Http\Controllers\API\Category;

use App\Http\Controllers\API\ApiController;
use App\Models\Category;
use Illuminate\Contracts\Pagination\Paginator;

class CategoryItemController extends ApiController
{
    public function index(Category $category): Paginator
    {
        return $category->items()
            ->with('consignmentNotes', 'price')
            ->simplePaginate($this->getPerPageValue());
    }
}
