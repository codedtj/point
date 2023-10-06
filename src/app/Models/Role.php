<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\Relation;

class Role extends Model
{
    protected static function boot()
    {
        parent::boot();

        Relation::morphMap([
            'user' => 'App\Models\User'
        ]);
    }

    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'roleable')
            ->withTimestamps();
    }
}
