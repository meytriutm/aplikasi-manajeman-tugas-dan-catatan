<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    // Menampilkan statistik tugas milik pengguna yang sedang login
    public function index(Request $request)
    {
        // Mengambil ID pengguna yang sedang login
        $userId = $request->user()->id;

        // Menghitung seluruh tugas pengguna
        $totalTasks = Task::where('user_id', $userId)
            ->count();

        // Menghitung tugas yang sudah selesai
        $completedTasks = Task::where('user_id', $userId)
            ->where('status', 'completed')
            ->count();

        // Menghitung tugas yang belum selesai
        $pendingTasks = Task::where('user_id', $userId)
            ->where('status', 'pending')
            ->count();

        // Menghitung tugas yang belum selesai dan sudah melewati tanggal
        $overdueTasks = Task::where('user_id', $userId)
            ->where('status', 'pending')
            ->whereNotNull('due_date')
            ->whereDate('due_date', '<', Carbon::today())
            ->count();

        // Menghitung persentase tugas yang selesai
        $completionPercentage = $totalTasks > 0
            ? round(($completedTasks / $totalTasks) * 100, 2)
            : 0;

        // Mengirim statistik dalam format JSON
        return response()->json([
            'message' => 'Statistik dashboard berhasil diambil',
            'data' => [
                'total_tasks' => $totalTasks,
                'completed_tasks' => $completedTasks,
                'pending_tasks' => $pendingTasks,
                'overdue_tasks' => $overdueTasks,
                'completion_percentage' => $completionPercentage,
            ],
        ]);
    }
}
