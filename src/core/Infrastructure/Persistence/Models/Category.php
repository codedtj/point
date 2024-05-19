<?php

namespace Core\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
