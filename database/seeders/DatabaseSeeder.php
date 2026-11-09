<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * run seeder
     */
    public function run(): void
    {
        // Menjalankan seeder untuk membuat akun Administrator.
        $this->call([
    AdminSeeder::class,
    DemoSeeder::class,
]);
    }
}
