<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Point extends Model
{
    use HasFactory;

    public function consignmentNotes(): HasMany
    {
        return $this->hasMany(ConsignmentNote::class);
    }
}
