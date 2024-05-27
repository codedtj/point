<?php

namespace Core\Domain\Entities;

interface Userstampable
{
    public function getCreatedById(): ?string;

    public function setCreatedById(string $createdById): void;

    public function getUpdatedById(): ?string;

    public function setUpdatedById(string $updatedById): void;

    public function getDeletedById(): ?string;

    public function setDeletedById(string $deletedById): void;
}
