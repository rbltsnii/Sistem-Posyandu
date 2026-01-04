<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@posyandu.com'],
            [
                'name' => 'Admin Utama',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // Pengguna
        User::updateOrCreate(
            ['email' => 'siti@gmail.com'],
            [
                'name' => 'Ibu Siti',
                'password' => Hash::make('password'),
                'role' => 'parent',
            ]
        );
    }
}
