<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    use HasFactory;

    public function receiptVouchers(): BelongsToMany
    {
        return $this->belongsToMany(ReceiptVoucher::class)->using(Pivot::class)->withPivot('quantity');
    }
}
