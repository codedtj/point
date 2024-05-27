<?php

namespace Core\Domain\Factories;

use Core\Domain\Entities\Point;
use Core\Domain\Traits\SetTimestamps;
use Core\Domain\Traits\SetUserStamps;
use DateTimeImmutable;

class PointFactory
{
    use SetTimestamps;
    use SetUserStamps;

    public function create(
        ?string $id,
        string $name,
        ?string $code = null,
        ?string $createdById = null,
        ?string $updatedById = null,
        ?string $deletedById = null,
        ?DateTimeImmutable $createdAt = null,
        ?DateTimeImmutable $updatedAt = null,
        ?DateTimeImmutable $deletedAt = null,
    ): Point
    {
        $point = new Point();
        $point->setId($id);
        $point->setName($name);
        $point->setCode($code);

        $this->setUserStamps($point, $createdById, $updatedById, $deletedById);
        $this->setTimestamps($point, $createdAt, $updatedAt, $deletedAt);

        return $point;
    }
}
