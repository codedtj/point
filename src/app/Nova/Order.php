<?php

namespace App\Nova;

use App\Enum\OrderStatus;
use App\Models\Order as OrderModel;
use App\Nova\Actions\Export\DownloadExcel;
use App\Nova\Actions\Order\CompleteOrder;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;


class Order extends Resource
{
    public static string $model = OrderModel::class;

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
            Date::make(__('Created At'), 'created_at')->sortable(),
            BelongsTo::make(__("Basket"), 'basket', Basket::class)->nullable()->withoutTrashed(),
            BelongsTo::make(__("User"), 'user', User::class)->nullable()->withoutTrashed(),
        ];
    }

    public function actions(NovaRequest $request)
    {
        return [
            resolve(CompleteOrder::class)
                ->canRun(function ($request, OrderModel $order) {
                    return $order->status !== OrderStatus::Completed;
                }),
            (new DownloadExcel)->withHeadings()
        ];
    }
}
