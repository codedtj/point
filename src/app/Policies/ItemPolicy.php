<?php

namespace App\Policies;

use App\Models\ConsignmentNote;
use App\Models\User;
use App\Models\Item;
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

    public function attachAnyConsignmentNote(User $user, Item $item): bool
    {
        return false;
    }
}
