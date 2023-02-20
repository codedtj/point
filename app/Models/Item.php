<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    public function receiptVouchers(): BelongsTo
    {
        return $this->belongsTo(ReceiptVoucher::class);
    }
}
