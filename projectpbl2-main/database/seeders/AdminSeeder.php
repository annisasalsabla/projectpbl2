<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Developer Admin',
            'email' => 'admin@craft.com',
            'phone' => '08123456789',
            'city' => 'Padang',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
    }
}
