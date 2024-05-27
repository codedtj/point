<?php

namespace Core\Domain\Entities;

use DateTimeImmutable;

interface Timestampable
{
    public function getCreatedAt(): ?DateTimeImmutable;

    public function getUpdatedAt(): ?DateTimeImmutable;

    public function getDeletedAt(): ?DateTimeImmutable;

    public function setCreatedAt(DateTimeImmutable $createdAt): void;

    public function setUpdatedAt(DateTimeImmutable $updatedAt): void;

    public function setDeletedAt(?DateTimeImmutable $deletedAt): void;
}
