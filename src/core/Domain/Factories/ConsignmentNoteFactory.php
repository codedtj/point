<?php

namespace Core\Domain\Factories;

use Core\Domain\Entities\ConsignmentNote;
use Core\Domain\Enums\ConsignmentNoteStatus;
use Core\Domain\Enums\ConsignmentNoteType;
use Core\Domain\Traits\SetTimestamps;
use Core\Domain\Traits\SetUserStamps;
use DateTimeImmutable;

class ConsignmentNoteFactory
{
    use SetTimestamps;
    use SetUserStamps;

    public function create(
        ?string $id,
        int $number,
        string $pointId,
        ?string $destinationPointId,
        ?string $counterparty,
        ConsignmentNoteType $type,
        ConsignmentNoteStatus $status,
        ?string $createdById = null,
        ?string $updatedById = null,
        ?string $deletedById = null,
        ?DateTimeImmutable $createdAt = null,
        ?DateTimeImmutable $updatedAt = null,
        ?DateTimeImmutable $deletedAt = null,
    ): ConsignmentNote {
        $note = new ConsignmentNote();
        $note->setId($id);
        $note->setNumber($number);
        $note->setPointId($pointId);
        $note->setDestinationPointId($destinationPointId);
        $note->setCounterparty($counterparty);
        $note->setType($type);
        $note->setStatus($status);

        $this->setUserStamps($note, $createdById, $updatedById, $deletedById);
        $this->setTimestamps($note, $createdAt, $updatedAt, $deletedAt);

        return $note;
    }
}
