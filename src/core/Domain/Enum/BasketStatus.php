<?php

namespace Core\Domain\Enum;

enum BasketStatus: int
{
    case Active = 0;
    case OrderCreated = 1;
    case Closed = 2;

    public function editable(): bool
    {
        return match($this) {
            self::Active => true,
            default => false,
        };
    }
}
