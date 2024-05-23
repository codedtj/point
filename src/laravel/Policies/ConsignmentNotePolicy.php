<?php

namespace App\Policies;

use Core\Domain\Enums\ConsignmentNoteStatus;
use Core\Infrastructure\Persistence\Models\ConsignmentNote;
use Core\Infrastructure\Persistence\Models\Item;
use Core\Infrastructure\Persistence\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsignmentNotePolicy
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

    public function update(User $user, ConsignmentNote $consignmentNote): bool
    {
        return $consignmentNote->status !== ConsignmentNoteStatus::Completed;
    }

    public function delete(User $user, ConsignmentNote $consignmentNote): bool
    {
        return $consignmentNote->status !== ConsignmentNoteStatus::Completed;
    }

    public function forceDelete(User $user, ConsignmentNote $consignmentNote): bool
    {
        return $consignmentNote->status !== ConsignmentNoteStatus::Completed;
    }

    public function attachAnyItem(User $user, ConsignmentNote $consignmentNote): bool
    {
        return $consignmentNote->status !== ConsignmentNoteStatus::Completed;
    }

    public function detachItem(User $user, ConsignmentNote $consignmentNote, Item $item): bool
    {
        return $consignmentNote->status !== ConsignmentNoteStatus::Completed;
    }
}
