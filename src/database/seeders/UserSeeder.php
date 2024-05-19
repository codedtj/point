<?php

namespace Database\Seeders;

use Core\Infrastructure\Persistence\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->create([
            'email' => 'test@test.com',
            'password' => bcrypt('1234'),
            'name' => 'Test',
        ]);
    }
}
