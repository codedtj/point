<?php

namespace App\Observers;

use App\Mail\OrderCreated;
use Core\Infrastructure\Persistence\Models\Order;
use Illuminate\Support\Facades\Mail;

class OrderObserver
{
    public function created(Order $order): void
    {
        Mail::to('info@boo.tj')->send(new OrderCreated($order));
    }

    public function updated(Order $order): void
    {
        //
    }

    public function deleted(Order $order): void
    {
        //
    }

    public function restored(Order $order): void
    {
        //
    }

    public function forceDeleted(Order $order): void
    {
        //
    }
}
