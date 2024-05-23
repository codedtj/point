<?php

namespace Core\Infrastructure\Persistence\Mappers;

use Core\Domain\Entities\Point;
use Core\Domain\Factories\PointFactory;
use Core\Infrastructure\Persistence\Models\Point as PointModel;

class PointMapper
{
    public function __construct(private readonly PointFactory $pointFactory)
    {
    }

    public function toEntity(PointModel $point): Point
    {
        return $this->pointFactory->create(
            $point->id,
            $point->name,
            $point->code,
            $point->created_by,
            $point->updated_by,
            $point->deleted_by,
            $point->created_at?->toDateTimeImmutable(),
            $point->updated_at?->toDateTimeImmutable(),
            $point->deleted_at?->toDateTimeImmutable()
        );
    }

    public function toModel(Point $point): PointModel
    {
        $model = new PointModel();
        $model->id = $point->getId();
        $model->name = $point->getName();
        $model->code = $point->getCode();
        $model->created_by = $point->getCreatedById();
        $model->updated_by = $point->getUpdatedById();
        $model->deleted_by = $point->getDeletedById();
        $model->created_at = $point->getCreatedAt();
        $model->updated_at = $point->getUpdatedAt();
        $model->deleted_at = $point->getDeletedAt();
        return $model;
    }
}
