<?php

namespace App\Helpers;

class Nova
{
    /**
     * @throws \ReflectionException
     */
    public static function getEnumValues(string $enum): array
    {
        $options = [];
        $reflection = new \ReflectionClass($enum);
        foreach ($reflection->getConstants() as $case) {
            $options[$case->value] = $case->name;
        }
        return $options;
    }
}
