<?php

namespace App\Repositories;

use Core\Infrastructure\Persistence\Models\Point;
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
