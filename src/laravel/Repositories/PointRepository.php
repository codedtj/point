<?php

namespace App\Repositories;

use App\Models\Point;
use Illuminate\Database\Eloquent\Collection;

class PointRepository
{
    /**
     * @return Collection<Point>
     */
    public function all(): Collection
    {
        return Point::all();
    }
}
