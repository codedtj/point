<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Point extends Model
{
    use HasFactory;

    public function receiptVouchers(): HasMany
    {
        return $this->hasMany(ConsignmentNote::class);
    }
}
