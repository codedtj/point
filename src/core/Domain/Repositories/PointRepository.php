<?php

namespace Core\Domain\Repositories;

use Core\Domain\Entities\Point;

interface PointRepository
{
    public function getAll(): array;
    public function getById(string $id): ?Point;
    public function save(Point $point): bool;
}
