<?php

namespace App\Nova;

use App\Nova\Actions\Export\DownloadExcel;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;


class StockBalance extends Resource
{
    public static string $model = \Core\Infrastructure\Persistence\Models\StockBalance::class;

    public static function label(): string
    {
        return __('Stock Balances');
    }

    public static function singularLabel(): string
    {
        return __('Stock Balance');
    }

    public static function updateButtonLabel()
    {
        return __('Update Stock Balance');
    }

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable()->hide(),
            BelongsTo::make(__('Item'), 'item', Item::class)->required(),
            BelongsTo::make(__('Point'), 'point', Point::class)->required(),
            Number::make(__('Quantity'), 'quantity')->required(),
            Number::make(__('Total price'), function () {
                return $this->quantity * $this->item->price->base;
            }),
        ];
    }

    public function actions(NovaRequest $request)
    {
        return [
            (new DownloadExcel)->withHeadings()->withoutConfirmation()
        ];
    }
}
