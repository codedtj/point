<?php

namespace Database\Seeders;

use Core\Infrastructure\Persistence\Models\Point;
use Illuminate\Database\Seeder;

class PointSeeder extends Seeder
{
    public function run(): void
    {
        Point::query()->create([
            'name' => 'Главный склад',
            'code' => 1,
        ]);
    }
}
