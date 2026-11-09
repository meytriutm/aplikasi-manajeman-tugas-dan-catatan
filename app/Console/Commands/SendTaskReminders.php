<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskDeadlineNotification;
use Illuminate\Console\Command;

class SendTaskReminders extends Command
{
    protected $signature = 'tasks:remind';
    protected $description = 'Kirim notifikasi tugas yang deadline hari ini atau terlambat';

    public function handle()
    {
        $today = now('Asia/Jakarta')->toDateString();
        $sent = 0;

        User::whereHas('pushSubscriptions')->each(function ($user) use ($today, &$sent) {
            $base = Task::where('user_id', $user->id)
                ->where('status', 'pending')
                ->whereNotNull('due_date');

            $dueToday = (clone $base)->whereDate('due_date', $today)->count();
            $overdue  = (clone $base)->whereDate('due_date', '<', $today)->count();

            if ($dueToday + $overdue === 0) return;

            $user->notify(new TaskDeadlineNotification($dueToday, $overdue));
            $sent++;
        });

        $this->info("Notifikasi terkirim ke {$sent} pengguna.");
    }
}