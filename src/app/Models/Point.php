<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Point extends Model
{
    public function consignmentNotes(): HasMany
    {
        return $this->hasMany(ConsignmentNote::class);
    }

    public function stockBalances(): HasMany
    {
        return $this->hasMany(StockBalance::class);
    }
}
