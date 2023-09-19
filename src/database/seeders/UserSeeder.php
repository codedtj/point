<?php

namespace Database\Seeders;

use App\Models\User;
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
