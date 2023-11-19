<?php

namespace App\Models;

use App\Enum\ConsignmentNoteStatus;
use App\Enum\ConsignmentNoteType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $id
 * @property string $point_id
 * @property ConsignmentNoteStatus $status
 * @property ConsignmentNoteType $type
 * @property Collection<Item> $items
 */
class ConsignmentNote extends Model
{
    protected $casts = [
        'status' => ConsignmentNoteStatus::class,
        'type' => ConsignmentNoteType::class,
    ];

    public function point(): BelongsTo
    {
        return $this->belongsTo(Point::class);
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class)
            ->using(Pivot::class)
            ->withPivot(['quantity', 'price']);
    }
}
