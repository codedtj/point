<?php

namespace Core\Infrastructure\Http\Controllers\API\Checkout;

use App\Services\Order\OrderService;
use Core\Domain\Enum\BasketStatus;
use Core\Domain\Enum\OrderStatus;
use Core\Infrastructure\Http\Controllers\API\ApiController;
use Core\Infrastructure\Persistence\Models\Basket;
use Core\Infrastructure\Persistence\Models\Order;
use Core\Infrastructure\Persistence\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class OrderController extends ApiController
{
    public function __construct(private readonly OrderService $orderService)
    {
    }

    public function show(Order $order): Model
    {
        return $order;
    }

    public function store(): Model
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

        $user = User::query()
            ->where('phone', request('phone'))
            ->orWhere('email', request('email'))
            ->first() ?? new User();

        $user->phone = request('phone');
        $user->email = request('email');
        $user->name = request('name');
        $user->address = request('address');
        $user->password = $user->password ?? bcrypt(Str::random(10));
        $user->save();

        /** @var Order $order */
        $order = Order::query()->firstOrNew(['basket_id' => $basket->id]);
        $order->user_id = $user->id;
        $order->basket_id = $basket->id;
        $order->status = request('status', OrderStatus::Draft);
        $order->code = $order->code ?? $this->orderService->generateCode();
        $order->save();

        $basket->status = BasketStatus::OrderCreated;
        $basket->user_id = $user->id;
        $basket->save();

        return $order;
    }
}
