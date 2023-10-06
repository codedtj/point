<?php

namespace App\Enum;

enum BasketStatus: int
{
    case Draft = 0;
    case AwaitingPayment = 1;
    case PaymentReceived = 2;
    case PaymentFailed = 3;
    case Processing = 4;
    case Shipped = 5;
    case Delivered = 6;
    case PickupReady = 7;
    case OnHold = 8;
    case Refunded = 9;
    case Completed = 10;
    case Returned = 11;
    case Expired = 12;
    case Cancelled = 13;
}
