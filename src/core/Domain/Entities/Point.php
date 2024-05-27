<?php

namespace Core\Domain\Entities;

use Core\Domain\Traits\Timestamps;
use Core\Domain\Traits\UserStamps;

class Point implements Timestampable, Userstampable
{
    use UserStamps;
    use Timestamps;

    private ?string $id = null;
    private string $name;
    private ?string $code = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): void
    {
        $this->code = $code;
    }
}
