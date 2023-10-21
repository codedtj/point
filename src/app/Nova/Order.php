<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;


class Order extends Resource
{
    public static string $model =  \App\Models\Order::class;

    public static $title = 'code';

    public static function label(): string
    {
        return __('Orders');
    }

    public static function singularLabel(): string
    {
        return __('Order');
    }

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable()->hide(),
            Text::make(__('Code'), 'code')->sortable()->rules('required'),
        ];
    }
}
