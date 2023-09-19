<?php

namespace Database\Seeders;

use App\Models\Point;
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
