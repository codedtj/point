<?php

namespace Core\Domain\Traits;

use Core\Domain\Entities\Userstampable;

trait SetUserStamps
{
    public function setUserStamps(
        Userstampable $entity,
        ?string $createdById,
        ?string $updatedById,
        ?string $deletedById
    ): void {
        if ($createdById !== null) {
            $entity->setCreatedById($createdById);
        }

        if ($updatedById !== null) {
            $entity->setUpdatedById($updatedById);
        }

        if ($deletedById !== null) {
            $entity->setDeletedById($deletedById);
        }
    }
}
