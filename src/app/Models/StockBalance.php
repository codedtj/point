<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property float $quantity
 * @property double $base_price
 */
class StockBalance extends Model
{
    public function point(): BelongsTo
    {
        return $this->belongsTo(Point::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
