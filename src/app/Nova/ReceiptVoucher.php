<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\BelongsTo;


class ReceiptVoucher extends Resource
{
    public static string $model = \App\Models\ReceiptVoucher::class;

    public static $title = 'number';

    public static function label(): string
    {
        return __('Receipt Vouchers');
    }

    public static function singularLabel(): string
    {
        return __('Receipt Voucher');
    }

    public static function createButtonLabel()
    {
        return __('Create Receipt Voucher');
    }

    public static function updateButtonLabel()
    {
        return __('Update Receipt Voucher');
    }

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable()->hide(),
            Text::make(__('Number'), 'number')->sortable()->rules('required'),
            BelongsTo::make('Point'),
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
