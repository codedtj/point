<?php

namespace App\Repositories;

use App\Models\ConsignmentNote;
use App\Models\Item;

class ConsignmentNoteRepository
{
    public function attachItem(ConsignmentNote $note, Item $item, float $quantity, float $price): void
    {
        $note->items()->attach($item->id, [
            'quantity' => $quantity,
            'price' => $price,
        ]);
    }
}
