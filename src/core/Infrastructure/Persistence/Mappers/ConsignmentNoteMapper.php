<?php

namespace Core\Infrastructure\Persistence\Mappers;

use Core\Domain\Entities\ConsignmentNote;
use Core\Domain\Factories\ConsignmentNoteFactory;
use Core\Infrastructure\Persistence\Models\ConsignmentNote as ConsignmentNoteModel;
use Core\Infrastructure\Persistence\Traits\ModelTimestamps;

class ConsignmentNoteMapper
{
    use ModelTimestamps;
    public function __construct(private readonly ConsignmentNoteFactory $factory)
    {
    }

    public function toEntity(ConsignmentNoteModel $note): ConsignmentNote
    {
        return $this->factory->create(
            $note->id,
            $note->number,
            $note->point_id,
            $note->destination_point_id,
            $note->counterparty,
            $note->type,
            $note->status,
            $note->created_by,
            $note->updated_by,
            $note->deleted_by,
            $note->created_at?->toDateTimeImmutable(),
            $note->updated_at?->toDateTimeImmutable(),
            $note->deleted_at?->toDateTimeImmutable()
        );
    }

    public function toModel(ConsignmentNote $note): ConsignmentNoteModel
    {
        $model = new ConsignmentNoteModel();
        $model->id = $note->getId();
        $model->number = $note->getNumber();
        $model->point_id = $note->getPointId();
        $model->destination_point_id = $note->getDestinationPointId();
        $model->counterparty = $note->getCounterparty();
        $model->type = $note->getType();
        $model->status = $note->getStatus();
        $this->setTimestamps($note, $model);
        return $model;
    }
}
