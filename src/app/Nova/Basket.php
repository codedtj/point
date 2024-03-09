<?php

namespace App\Nova;

use App\Nova\Actions\Export\DownloadExcel;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;


class Basket extends Resource
{
    public static string $model =  \App\Models\Basket::class;

    public static function label(): string
    {
        return __('Baskets');
    }

    public static function singularLabel(): string
    {
        return __('Basket');
    }

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),
            Date::make(__('Created At'), 'created_at')->sortable(),
            BelongsToMany::make(__('Items'), 'items', Item::class)
                ->fields(function () {
                    return [
                        Number::make(__('Quantity'), 'quantity')
                            ->min(0)
                            ->rules('required', 'numeric', 'min:1', 'max:100'),
                    ];
                })

        ];
    }

    public function actions(NovaRequest $request)
    {
        return [
            (new DownloadExcel)->withHeadings()
        ];
    }
}
