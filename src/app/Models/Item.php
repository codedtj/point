<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $id
 * @property Category $category
 * @property Collection $consignmentNotes
 * @property StockBalance $latestStockBalance
 * @property Collection $stockBalances
 * @property ?Price $price
 * @property Collection $priceHistory
 */
class Item extends Model
{
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function consignmentNotes(): BelongsToMany
    {
        return $this->belongsToMany(ConsignmentNote::class)
            ->using(Pivot::class)
            ->withPivot(['quantity', 'price']);
    }

    public function latestStockBalance(): HasOne
    {
        return $this->hasOne(StockBalance::class)->latest();
    }

    public function stockBalances(): HasMany
    {
        return $this->hasMany(StockBalance::class);
    }

    public function price(): HasOne
    {
        return $this->hasOne(Price::class)->latest();
    }

    public function priceHistory(): HasMany
    {
        return $this->hasMany(Price::class);
    }
}
