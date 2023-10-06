<?php

namespace App\Models;

use App\Enum\BasketStatus;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $id
 * @property BasketStatus $status
 * @property Collection $items
 */
class Basket extends Model
{
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class)
            ->using(Pivot::class)
            ->withPivot(['quantity']);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
