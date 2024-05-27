<?php

namespace Core\Infrastructure\Persistence\Models;

use Carbon\Carbon;
use Core\Domain\Enums\ConsignmentNoteStatus;
use Core\Domain\Enums\ConsignmentNoteType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $id
 * @property int $number
 * @property string $point_id
 * @property ?string destination_point_id
 * @property ?string $counterparty
 * @property ConsignmentNoteStatus $status
 * @property ConsignmentNoteType $type
 * @property Collection<Item> $items
 * @property Point $point
 * @property Point $destinationPoint
 * @property ?Carbon $created_at
 * @property ?Carbon $updated_at
 * @property ?Carbon $deleted_at
 * @property ?string $created_by
 * @property ?string $updated_by
 * @property ?string $deleted_by
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

    public function destinationPoint(): BelongsTo
    {
        return $this->belongsTo(Point::class);
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class)
            ->using(Pivot::class)
            ->withPivot(['quantity', 'prime_cost']);
    }
}
