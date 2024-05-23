<?php

namespace Core\Domain\Traits;

trait UserStamps
{
    private ?string $createdById = null;
    private ?string $updatedById = null;
    private ?string $deletedById = null;

    public function getCreatedById(): ?string
    {
        return $this->createdById;
    }

    public function setCreatedById(string $createdById): void
    {
        $this->createdById = $createdById;
    }

    public function getUpdatedById(): ?string
    {
        return $this->updatedById;
    }

    public function setUpdatedById(string $updatedById): void
    {
        $this->updatedById = $updatedById;
    }

    public function getDeletedById(): ?string
    {
        return $this->deletedById;
    }

    public function setDeletedById(string $deletedById): void
    {
        $this->deletedById = $deletedById;
    }
}
