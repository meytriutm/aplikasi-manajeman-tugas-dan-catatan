<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // Akun user demo untuk asesor
        $user = User::updateOrCreate(
            ['username' => 'user'],
            [
                'name' => 'User Demo',
                'password' => 'user12345',
                'role' => 'user',
            ]
        );

        // Tanggal relatif terhadap hari ini (zona waktu sama dengan tasks:remind)
        $today = now('Asia/Jakarta');

        $tasks = [
            [
                'title' => 'Tugas deadline hari ini (demo)',
                'due_date' => $today->toDateString(),
            ],
            [
                'title' => 'Tugas terlambat (demo)',
                'due_date' => $today->copy()->subDay()->toDateString(),
            ],
        ];

        foreach ($tasks as $task) {
            Task::updateOrCreate(
                ['user_id' => $user->id, 'title' => $task['title']],
                [
                    'description' => 'Data demo untuk menguji notifikasi pengingat.',
                    'status' => 'pending',
                    'priority' => 'medium',
                    'due_date' => $task['due_date'],
                ]
            );
        }
    }
}