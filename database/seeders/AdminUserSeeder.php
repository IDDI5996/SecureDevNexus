<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Check if admin already exists
            [
                'name' => 'Super Admin',
                'password' => Hash::make('Admin@12345'), // Strong default password
                'role' => 'admin',
                'profile_photo' => 'default_admin.png' // if you have profile photo column
            ]
        );
    }
}
