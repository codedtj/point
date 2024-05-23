<?php

namespace Database\Factories;

use App\Helpers\Enum;
use Core\Domain\Enum\Unit;
use Core\Infrastructure\Persistence\Models\Item;
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
