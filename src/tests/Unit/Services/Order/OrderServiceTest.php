<?php

namespace Tests\Unit\Services\Order;

use App\Services\Order\OrderService;
use Core\Domain\Enums\OrderStatus;
use Core\Infrastructure\Persistence\Models\Basket;
use Core\Infrastructure\Persistence\Models\ConsignmentNote;
use Core\Infrastructure\Persistence\Models\Item;
use Core\Infrastructure\Persistence\Models\Order;
use Core\Infrastructure\Persistence\Models\Point;
use Core\Infrastructure\Persistence\Models\StockBalance;
use Core\Infrastructure\Persistence\Models\User;
use Illuminate\Database\Eloquent\Collection;
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

    public function testConsignmentNotesCreatedForEachPoint()
    {
        $item = Item::factory()->create();
        $points = $this->createPointsWithStockBalances($item);
        $order = $this->createOrderWithItem($item);

        $this->orderService->changeStatus($order, OrderStatus::Completed);

        $this->assertConsignmentNotesCreatedForPoints($points);
    }

    private function createPointsWithStockBalances(Item $item): Collection
    {
        $points = Point::factory(2)->create();

        foreach ($points as $index => $point) {
            StockBalance::query()->create([
                'item_id' => $item->id,
                'point_id' => $point->id,
                'quantity' => $index + 1,
            ]);
        }

        return $points;
    }

    private function createOrderWithItem(Item $item): Order
    {
        $basket = Basket::factory()->create();

        /** @var Order $order */
        $order = Order::query()->create([
            'status' => OrderStatus::Draft,
            'code' => $this->orderService->generateCode(),
            'basket_id' => $basket->id,
            'user_id' => User::factory()->create()->id,
        ]);

        $basket->items()->attach($item, ['quantity' => 3]);

        return $order;
    }

    private function assertConsignmentNotesCreatedForPoints(Collection $points): void
    {
        $this->assertCount(2, ConsignmentNote::all(), 'Two consignment notes should be created.');

        foreach ($points as $index => $point) {
            /** @var ConsignmentNote $consignmentNote*/
            $consignmentNote = ConsignmentNote::query()->where('point_id', $point->id)->firstOrFail();
            $quantity = $consignmentNote->items[0]->pivot->quantity;
            $this->assertEquals(
                $index + 1,
                $quantity ,
                "Consignment Note for Point $point->id should have one item."
            );
        }
    }
}
