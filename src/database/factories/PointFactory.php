<?php

namespace Database\Factories;

use Core\Infrastructure\Persistence\Models\Point;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PointFactory extends Factory
{
    protected $model = Point::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'code' => Str::random(6),
        ];
    }
}
