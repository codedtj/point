<?php

namespace Core\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\Relation;

class Role extends Model
{
    protected static function boot()
    {
        parent::boot();

        Relation::morphMap([
            'user' => 'Core\Infrastructure\Persistence\Models\User'
        ]);
    }

    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'roleable')
            ->withTimestamps();
    }
}
