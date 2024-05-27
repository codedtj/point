<?php

namespace Core\Domain\Traits;

use Core\Domain\Entities\Timestampable;
use DateTimeImmutable;

trait SetTimestamps
{
    private function setTimestamps(
        Timestampable $entity,
        ?DateTimeImmutable $createdAt,
        ?DateTimeImmutable $updatedAt,
        ?DateTimeImmutable $deletedAt
    ): void {
        if ($createdAt === null) {
            $createdAt = new DateTimeImmutable();
        }

        if ($updatedAt === null) {
            $updatedAt = new DateTimeImmutable();
        }

        $entity->setCreatedAt($createdAt);
        $entity->setUpdatedAt($updatedAt);
        $entity->setDeletedAt($deletedAt);
    }
}
