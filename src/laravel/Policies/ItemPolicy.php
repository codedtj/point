<?php

namespace App\Policies;

use Core\Infrastructure\Persistence\Models\ConsignmentNote;
use Core\Infrastructure\Persistence\Models\Item;
use Core\Infrastructure\Persistence\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    public function viewAny(): bool
    {
        return true;
    }

    public function view(): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Item $item): bool
    {
        return true;
    }

    public function attachAnyConsignmentNote(User $user, Item $item): bool
    {
        return false;
    }

    public function detachConsignmentNote(User $user, Item $item, ConsignmentNote $consignmentNote): bool
    {
        return false;
    }
}
