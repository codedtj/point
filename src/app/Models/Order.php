<?php

namespace App\Models;

use App\Enum\OrderStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property string $id
 * @property OrderStatus $status
 * @property string $user_id
 * @property string $basket_id
 * @property string $code
 */
class Order extends Model
{
    protected $casts = [
        'status' => OrderStatus::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function basket(): BelongsTo
    {
        return $this->belongsTo(Basket::class);
    }

    public function items(): HasManyThrough
    {
        return $this->hasManyThrough(Item::class, Basket::class, 'order_id', 'basket_id', 'id', 'id');
    }
}
