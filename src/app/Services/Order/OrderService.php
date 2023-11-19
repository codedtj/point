<?php

namespace App\Services\Order;

use App\Enum\ConsignmentNoteStatus;
use App\Enum\OrderStatus;
use App\Models\Order;
use App\Services\ConsignmentNote\ConsignmentNoteService;
use Illuminate\Support\Str;

class OrderService
{
    public function __construct(private readonly ConsignmentNoteService $consignmentNoteService)
    {
    }

    public function generateCode(): string
    {
        $timestamp = now()->format('YmdHis');
        $randomString = Str::random(6);

        return "$timestamp$randomString";
    }

    public function changeStatus(Order $order, OrderStatus $status): void
    {
        $order->update([
            'status' => $status,
        ]);

        if ($status === OrderStatus::Completed) {
            $consignmentNote = $this->consignmentNoteService
                ->createFromOrder($order, ConsignmentNoteStatus::Completed);

            if ($consignmentNote->status === ConsignmentNoteStatus::Completed) {
                $this->consignmentNoteService
                    ->processItemStockAndPriceChange($consignmentNote);
            }
        }
    }
}
