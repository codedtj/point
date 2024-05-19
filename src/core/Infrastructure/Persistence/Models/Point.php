<?php

namespace Core\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $id
 */
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
