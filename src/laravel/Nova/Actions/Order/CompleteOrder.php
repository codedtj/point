<?php

namespace App\Nova\Actions\Order;

use App\Enum\OrderStatus;
use App\Models\Order;
use App\Services\Order\OrderService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class CompleteOrder extends Action
{
    use InteractsWithQueue, Queueable;

    public function __construct(private readonly OrderService $orderService)
    {
    }

    public function handle(ActionFields $fields, Collection $models): array
    {
        /** @var Order $model */
        foreach ($models as $model) {
            if ($model->status === OrderStatus::Completed) {
                continue;
            }

            $this->orderService->changeStatus($model, OrderStatus::Completed);
        }

        return Action::message(__('Order(s) marked as completed!'));
    }

    public function fields(NovaRequest $request): array
    {
        return [];
    }

    public function name(): string
    {
        return __('Mark as completed');
    }
}
