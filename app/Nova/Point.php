<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Point extends Resource
{
    public static string $model = \App\Models\Point::class;

    public static function label(): string
    {
        return __('Points');
    }

    public static function singularLabel(): string
    {
        return __('Point');
    }

    public static function createButtonLabel()
    {
        return __('Create Point');
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
            Text::make(__('Code'), 'code')->maxlength(50)->sortable()->nullable()
        ];
    }
}
