<?php

namespace Database\Factories;

use App\Enum\BasketStatus;
use App\Helpers\Enum;
use App\Models\Basket;
use App\Models\User;
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
