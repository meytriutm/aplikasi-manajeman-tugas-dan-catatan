<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat atau memperbarui akun Admin
        User::updateOrCreate(
            ['username' => 'administrator'],
            [
                'name' => 'Administrator',
                'password' => 'administrator123',
                'role' => 'admin',
            ]
        );
    }
}
