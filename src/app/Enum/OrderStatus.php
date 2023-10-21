<?php

namespace App\Enum;

enum OrderStatus: int
{
    case Draft = 0;
    case Confirmed = 1;
    case AwaitingPayment = 2;
    case PaymentFailed= 3;
    case PaymentReceived = 4;
    case Processing = 5;
    case Shipped = 6;
    case Delivered = 7;
    case PickupReady = 8;
    case OnHold = 9;
    case Refunded = 10;
    case Completed = 11;
    case Returned = 12;
    case Expired = 13;
    case Cancelled = 14;

    public function editable(): bool
    {
        return $this === self::Draft;
    }
}
