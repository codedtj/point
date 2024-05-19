<?php

namespace Core\Infrastructure\Http\Controllers\API\Category;

use App\Models\Category;
use Core\Infrastructure\Http\Controllers\API\ApiController;
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
