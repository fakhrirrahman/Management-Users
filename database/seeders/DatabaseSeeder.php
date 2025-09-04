<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Fahrir Admin',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );

        // Sample regular user
        User::query()->updateOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Fahrir User',
                'password' => bcrypt('password'),
                'role' => 'user',
            ]
        );
    }
}
