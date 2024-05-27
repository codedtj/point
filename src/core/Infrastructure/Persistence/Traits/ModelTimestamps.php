<?php

namespace Core\Infrastructure\Persistence\Traits;

use Carbon\CarbonImmutable;
use Core\Domain\Entities\Timestampable;
use Illuminate\Database\Eloquent\Model;

trait ModelTimestamps
{
    public static function setTimestamps(Timestampable $entity, Model $model): void
    {
        $model->created_at = $entity->getCreatedAt() === null ? null : CarbonImmutable::parse($entity->getCreatedAt());
        $model->updated_at = $entity->getUpdatedAt() === null ? null : CarbonImmutable::parse($entity->getUpdatedAt());
        $model->deleted_at = $entity->getDeletedAt() === null ? null : CarbonImmutable::parse($entity->getDeletedAt());
    }
}
