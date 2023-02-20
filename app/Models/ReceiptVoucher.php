<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReceiptVoucher extends Model
{
    use HasFactory;

    public function point(): BelongsTo
    {
        return $this->belongsTo(Point::class);
    }

    public function items(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
