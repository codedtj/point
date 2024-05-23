<?php

namespace Core\Infrastructure\Persistence\Repositories;

use Core\Domain\Entities\Point;
use Core\Infrastructure\Persistence\Mappers\PointMapper;
use Core\Infrastructure\Persistence\Models\Point as PointModel;
use Core\Domain\Repositories\PointRepository as PointRepositoryInterface;

class PointRepository implements PointRepositoryInterface
{
    public function __construct(private readonly PointMapper $pointMapper)
    {
    }

    public function getAll(): array
    {
        $models = PointModel::all();

        return $models->map(function (PointModel $model) {
            return $this->pointMapper->toEntity($model);
        })->toArray();
    }

    public function getById(string $id): ?Point
    {
        /** @var PointModel $model */
        $model = PointModel::query()->find($id);

        if ($model === null) {
            return null;
        }

        return $this->pointMapper->toEntity($model);
    }

    public function save(Point $point): bool
    {
        $model = $this->pointMapper->toModel($point);
        return $model->save();
    }
}
