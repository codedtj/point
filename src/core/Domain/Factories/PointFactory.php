<?php

namespace Core\Domain\Factories;

use Core\Domain\Entities\Point;
use DateTimeImmutable;

class PointFactory
{
    public function create(
        ?string            $id,
        string             $name,
        ?string            $code = null,
        ?string            $createdById = null,
        ?string            $updatedById = null,
        ?string            $deletedById = null,
        ?DateTimeImmutable $createdAt = null,
        ?DateTimeImmutable $updatedAt = null,
        ?DateTimeImmutable $deletedAt = null,
    ): Point
    {
        $point = new Point();
        $point->setId($id);
        $point->setName($name);
        $point->setCode($code);
        if ($createdById !== null) {
            $point->setCreatedById($createdById);
        }
        if ($updatedById !== null) {
            $point->setUpdatedById($updatedById);
        }
        if ($deletedById !== null) {
            $point->setDeletedById($deletedById);
        }
        if ($createdAt === null) {
            $createdAt = new DateTimeImmutable();
        }

        if ($updatedAt === null) {
            $updatedAt = new DateTimeImmutable();
        }

        $point->setCreatedAt($createdAt);
        $point->setUpdatedAt($updatedAt);
        $point->setDeletedAt($deletedAt);
        return $point;
    }
}
