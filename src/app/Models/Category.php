<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property float $quantity
 * @property double $base_price
 */
class Category extends Model
{
    use HasFactory;

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
