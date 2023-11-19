<?php

namespace Tests\Unit\Services\Order;

use App\Enum\OrderStatus;
use App\Models\Basket;
use App\Models\ConsignmentNote;
use App\Models\Item;
use App\Models\Order;
use App\Models\Point;
use App\Models\StockBalance;
use App\Models\User;
use App\Services\Order\OrderService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderServiceTest extends TestCase
{
    use RefreshDatabase;

    private readonly OrderService $orderService;

    public function setUp(): void
    {
        parent::setUp();

        $this->orderService = app(OrderService::class);
    }

    public function test_consignment_notes_created_for_each_point()
    {
        // Arrange
        $item = Item::factory()->create();
        $points = Point::factory()->count(2)->create();

         StockBalance::query()->create([
            'item_id' => $item->id,
            'point_id' => $points[0]->id,
            'quantity' => 1,
        ]);

        StockBalance::query()->create([
            'item_id' => $item->id,
            'point_id' => $points[1]->id,
            'quantity' => 2,
        ]);

        $basket = Basket::factory()->create();

        $order = Order::query()->create([
            'status' => OrderStatus::Draft,
            'code' => $this->orderService->generateCode(),
            'basket_id' => $basket->id,
            'user_id' => User::factory()->create()->id,
        ]);

        $basket->items()->attach($item, ['quantity' => 3]);

        $this->orderService->changeStatus($order, OrderStatus::Completed);

        $this->assertCount(2, ConsignmentNote::all());
        $this->assertCount(1, ConsignmentNote::query()->where('point_id', $points[0]->id)->first()->items);
        $this->assertCount(1, ConsignmentNote::query()->where('point_id', $points[1]->id)->first()->items);
    }
}
