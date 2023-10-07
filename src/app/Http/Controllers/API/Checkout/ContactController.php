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

class ContactController extends ApiController
{
    public function __construct(private readonly OrderService $orderService)
    {
    }

    public function __invoke(Basket $basket): Model
    {
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
                    'email' => request('email'),
                ],
                [
                    'name' => request('name'),
                    'phone' => request('phone'),
                    'address' => request('address'),
                    'password' => bcrypt(Str::random(10))
                ]
            );

        /** @var Order $order */
        $order = Order::query()->firstOrNew(['basket_id' => $basket->id]);
        $order->user_id = $user->id;
        $order->basket_id = $basket->id;
        $order->status = OrderStatus::Processing;
        $order->code = $order->code ?? $this->orderService->generateOrderCode();
        $order->save();

        $basket->status = BasketStatus::OrderCreated;
        $basket->user_id = $user->id;
        $basket->save();

        return $user;
    }
}
