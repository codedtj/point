<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $id
 * @property double $base
 * @property ?double $manual
 * @property string $item_id
 * @property ?string $point_id
 * @property Item $item
 * @property ?Point $point
 */
class Price extends Model
{
    protected $casts = [
        'base' => 'double',
        'final' => 'double',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function point(): BelongsTo
    {
        return $this->belongsTo(Point::class);
    }
}
