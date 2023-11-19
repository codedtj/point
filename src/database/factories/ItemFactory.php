<?php

namespace Database\Factories;

use App\Enum\Unit;
use App\Helpers\Enum;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'code' => Str::random(6),
            'unit' => $this->faker->randomElement(Enum::getValues(Unit::class)),
            'description' => $this->faker->text(),
        ];
    }
}
