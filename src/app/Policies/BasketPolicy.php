<?php

namespace App\Policies;

use App\Models\Basket;
use App\Models\Item;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasketPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny(): bool
    {
        return true;
    }

    public function view(): bool
    {
        return true;
    }

    public function attachAnyItem(User $user, Basket $basket): bool
    {
        return false;
    }

    public function detachItem(User $user, Basket $basket, Item $item): bool
    {
        return false;
    }
}
