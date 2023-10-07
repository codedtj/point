<?php

namespace App\Services\Order;

use Illuminate\Support\Str;

class OrderService
{
    public function generateOrderCode(): string
    {
        $timestamp = now()->format('YmdHis');
        $randomString = Str::random(6);

        return "$timestamp$randomString";
    }
}
