<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $id
 */
class Item extends Model
{
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function consignmentNotes(): BelongsToMany
    {
        return $this->belongsToMany(ConsignmentNote::class)
            ->using(Pivot::class)
            ->withPivot(['quantity', 'price']);
    }
}
