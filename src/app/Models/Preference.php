<?php

namespace App\Models;

/**
 * @property array $app
 */
class Preference extends Model
{
    public $casts = [
        'app' => 'array'
    ];
}
