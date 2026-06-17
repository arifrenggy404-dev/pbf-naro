<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@gereja.com',
            'password' => Hash::make('password'),
            'role' => 'Admin',
        ]);

        // Koordinator Pelayanan
        User::create([
            'name' => 'Koordinator Jadwal',
            'email' => 'koordinator@gereja.com',
            'password' => Hash::make('password'),
            'role' => 'Koordinator',
        ]);

        // Bendahara
        User::create([
            'name' => 'Bendahara Gereja',
            'email' => 'bendahara@gereja.com',
            'password' => Hash::make('password'),
            'role' => 'Bendahara',
        ]);
    }
}
