<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
