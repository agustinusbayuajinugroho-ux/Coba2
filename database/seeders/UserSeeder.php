<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat user Admin
        User::create([
            'name' => 'Admin Perpus',
            'email' => 'admin@perpus.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Membuat user biasa
        User::create([
            'name' => 'Member Perpus',
            'email' => 'member@perpus.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}