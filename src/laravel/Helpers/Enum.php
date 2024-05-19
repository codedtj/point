<?php

namespace App\Helpers;

class Enum
{
    /**
     * @throws \ReflectionException
     */
    public static function getValues(string $enum): array
    {
        $values = [];
        $reflection = new \ReflectionClass($enum);
        foreach ($reflection->getConstants() as $case) {
            $values[] = $case->value;
        }
        return $values;
    }
}
