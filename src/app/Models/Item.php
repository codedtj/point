<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    use HasFactory;

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
