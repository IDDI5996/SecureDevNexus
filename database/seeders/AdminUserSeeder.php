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
        // Add Iddi B. Hemedi as admin
        User::updateOrCreate(
            ['email' => 'iddihemedi11@gmail.com'],
            [
                'name' => 'Iddi B. Hemedi',
                'password' => Hash::make('Admin@12345'), // Strong default password
                'role' => 'admin',
                'profile_photo' => 'default_admin.png'
            ]
        );

        // Add Zin Fai Yang as super admin
        User::updateOrCreate(
            ['email' => 'zinfaiyang@gmail.com'],
            [
                'name' => 'Zin Fai Yang',
                'password' => Hash::make('SuperAdmin@12345'), // Strong default password
                'role' => 'super_admin',
                'profile_photo' => 'default_admin.png'
            ]
        );

        // Keep the original admin user as well
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('Admin@12345'),
                'role' => 'admin',
                'profile_photo' => 'default_admin.png'
            ]
        );
    }
}