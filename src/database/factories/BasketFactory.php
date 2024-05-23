<?php

namespace Database\Factories;

use App\Helpers\Enum;
use Core\Domain\Enums\BasketStatus;
use Core\Infrastructure\Persistence\Models\Basket;
use Core\Infrastructure\Persistence\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BasketFactory extends Factory
{
    protected $model = Basket::class;

    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(Enum::getValues(BasketStatus::class)),
            'user_id' => User::factory(),
        ];
    }
}
