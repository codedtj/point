<?php

namespace App\Nova;

use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Point extends Resource
{
    public static string $model = \Core\Infrastructure\Persistence\Models\Point::class;

    public static $title = 'name';

    public static function label(): string
    {
        return __('Points');
    }

    public static function singularLabel(): string
    {
        return __('Point');
    }

    public static function updateButtonLabel()
    {
        return __('Update Point');
    }

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable()->hide(),
            Text::make(__('Name'), 'name')->maxlength(100)->sortable(),
            Text::make(__('Code'), 'code')->maxlength(50)->sortable()->nullable(),
            HasMany::make(__('Consignment Notes'), 'consignmentNotes', ConsignmentNote::class),
            HasMany::make(__('Stock Balances'), 'stockBalances', StockBalance::class),
        ];
    }
}
