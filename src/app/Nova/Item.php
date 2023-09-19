<?php

namespace App\Nova;

use App\Enum\Unit;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Item extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Item>
     */
    public static $model = \App\Models\Item::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'title',
        'code',
        'description'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label(): string
    {
        return __('Items');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel(): string
    {
        return __('Item');
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable()->hide(),
            Text::make(__('Item title'), 'title')
                ->maxlength(100)
                ->sortable()
                ->rules('required'),
            Text::make(__('Item code'), 'code')
                ->maxlength(50)
                ->sortable()
                ->rules('required'),
            Text::make(__('Description'), 'description')
                ->nullable(),
            Select::make(__('Item units'), 'unit')
                ->options(function() {
                $options = [];

                foreach (Unit::cases() as $case) {
                    $options[$case->value] = __($case->name);
                }

                return $options;
            })
                ->displayUsingLabels()
                ->rules('required'),
            BelongsToMany::make(__('Receipt Vouchers'), 'receiptVouchers', ConsignmentNote::class)
                ->fields(function ($request, $relatedModel) {
                return [
                    Number::make(__('Quantity'), 'quantity'),
                ];
            }),
            Image::make(__('Image'), 'image')
                ->disk('public')
                ->path('items')
                ->nullable()
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
