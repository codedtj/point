<?php

namespace Core\Domain\Entities;

use Core\Domain\Enums\ConsignmentNoteStatus;
use Core\Domain\Enums\ConsignmentNoteType;
use Core\Domain\Traits\Timestamps;
use Core\Domain\Traits\UserStamps;

class ConsignmentNote implements Timestampable, Userstampable
{
    use UserStamps;
    use Timestamps;

    private ?string $id;
    private int $number;
    private string $pointId;
    private ?string $destinationPointId;
    private ?string $counterparty;
    private ConsignmentNoteType $type;
    private ConsignmentNoteStatus $status;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): void
    {
        $this->number = $number;
    }

    public function getPointId(): string
    {
        return $this->pointId;
    }

    public function setPointId(string $pointId): void
    {
        $this->pointId = $pointId;
    }

    public function getDestinationPointId(): ?string
    {
        return $this->destinationPointId;
    }

    public function setDestinationPointId(?string $destinationPointId): void
    {
        $this->destinationPointId = $destinationPointId;
    }

    public function getCounterparty(): ?string
    {
        return $this->counterparty;
    }

    public function setCounterparty(?string $counterparty): void
    {
        $this->counterparty = $counterparty;
    }

    public function getType(): ConsignmentNoteType
    {
        return $this->type;
    }

    public function setType(ConsignmentNoteType $type): void
    {
        $this->type = $type;
    }

    public function getStatus(): ConsignmentNoteStatus
    {
        return $this->status;
    }

    public function setStatus(ConsignmentNoteStatus $status): void
    {
        $this->status = $status;
    }
}
