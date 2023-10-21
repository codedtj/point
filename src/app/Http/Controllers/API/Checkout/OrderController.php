<?php

namespace App\Http\Controllers\API\Checkout;

use App\Enum\BasketStatus;
use App\Enum\OrderStatus;
use App\Http\Controllers\API\ApiController;
use App\Models\Basket;
use App\Models\Order;
use App\Models\User;
use App\Services\Order\OrderService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class OrderController extends ApiController
{
    public function __construct(private readonly OrderService $orderService)
    {
    }

    public function __invoke(): Model
    {
        $basket = Basket::query()->find(request()->get('basket_id'));

        if (!$basket) {
            abort(404, 'Basket not found');
        }

        if ($basket->status !== BasketStatus::Active) {
            abort(400, 'Basket is not active');
        }

        if ($basket->items()->count() === 0) {
            abort(400, 'Basket is empty');
        }

        /** @var User $user */
        $user = User::query()
            ->updateOrCreate(
                [
                    'phone' => request('phone'),
                ],
                [
                    'name' => request('name'),
                    'address' => request('address'),
                    'password' => bcrypt(Str::random(10))
                ]
            );

        /** @var Order $order */
        $order = Order::query()->firstOrNew(['basket_id' => $basket->id]);
        $order->user_id = $user->id;
        $order->basket_id = $basket->id;
        $order->status = request('status', OrderStatus::Draft);
        $order->code = $order->code ?? $this->orderService->generateOrderCode();
        $order->save();

        $basket->status = BasketStatus::OrderCreated;
        $basket->user_id = $user->id;
        $basket->save();

        return $user;
    }
}
