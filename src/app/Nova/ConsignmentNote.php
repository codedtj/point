<?php

namespace App\Nova;

use App\Enum\ConsignmentNoteType;
use App\Enum\Unit;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\BelongsTo;


class ConsignmentNote extends Resource
{
    public static string $model = \App\Models\ConsignmentNote::class;

    public static $title = 'number';

    public static function label(): string
    {
        return __('Consignment Notes');
    }

    public static function singularLabel(): string
    {
        return __('Consignment Note');
    }

    public static function createButtonLabel()
    {
        return __('Create Consignment Note');
    }

    public static function updateButtonLabel()
    {
        return __('Update Consignment Note');
    }

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable()->hide(),
            Text::make(__('Number'), 'number')->sortable()->rules('required'),
            BelongsTo::make(__('Point'), 'point', Point::class)->required(),
            Select::make(__('Type'), 'type')
                ->options(function() {
                    $options = [];

                    foreach (ConsignmentNoteType::cases() as $case) {
                        $options[$case->value] = __('Consignment Note ' . $case->name);
                    }

                    return $options;
                }),
            BelongsToMany::make(__('Items'), 'items', Item::class)
                ->required()
                ->fields(function ($request, $relatedModel) {
                return [
                    Number::make(__('Quantity'), 'quantity')->rules('required'),
                ];
            }),
        ];
    }
}
