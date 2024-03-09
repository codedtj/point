<?php

namespace App\Models;

class Preference extends Model
{
    public $casts = [
        'app' => 'array'
    ];
}
