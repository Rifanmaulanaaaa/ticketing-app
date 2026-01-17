<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => 'password', // ⬅️ PLAIN TEXT
                'role' => 'admin',
            ],
            [
                'name' => 'Regular User',
                'email' => 'user@gmail.com',
                'password' => 'password', // ⬅️ PLAIN TEXT
                'no_hp' => '081234567890',
                'role' => 'user',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']], // key unik
                $user
            );
        }
    }
}
