<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Task;
use App\Models\Note;
use App\Models\Category;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminDashboardController extends Controller
{
    // inii buatt nampilin statistik global untuk dashboard Admin
    public function index(Request $request)
    {
        // Menghitung jumlah seluruh pengguna berdasarkan role
        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalRegularUsers = User::where('role', 'user')->count();

        // Menghitung seluruh tugas dan statusnya
        $totalTasks = Task::count();
        $completedTasks = Task::where('status', 'completed')->count();
        $pendingTasks = Task::where('status', 'pending')->count();

        // Menghitung tugas yang belum selesai dan melewati tanggal
        $overdueTasks = Task::where('status', 'pending')
            ->whereNotNull('due_date')
            ->whereDate('due_date', '<', Carbon::today())
            ->count();

        // Menghitung persentase tugas yang selesai
        $completionPercentage = $totalTasks > 0
            ? round(($completedTasks / $totalTasks) * 100, 2)
            : 0;

        // Menghitung seluruh catatan dan kategori
        $totalNotes = Note::count();
        $totalCategories = Category::count();

        // Mengambil aktivitas terbaru beserta penggunanya
        $recentActivities = ActivityLog::with('user')
            ->latest('created_at')
            ->take(10)
            ->get()
            ->map(function ($activity) {

                // Menyesuaikan data biar cocok dengan dashboard Admin
                $type = str_starts_with($activity->activity_type, 'task_')
                    ? 'task'
                    : (str_starts_with($activity->activity_type, 'note_')
                        ? 'note'
                        : 'other');

                return [
                    'type' => $type,
                    'action' => $activity->activity_type,
                    'actor' => $activity->user?->name ?? 'Pengguna tidak tersedia',
                    'username' => $activity->user?->username,
                    'title' => $activity->description,
                    'detail' => null,
                    'time' => $activity->created_at?->toISOString(),
                ];
            });

        // Mengirim seluruh statistik dan aktivitas ke dashboard Admin
        return response()->json([
            'message' => 'Statistik dashboard Admin berhasil diambil',
            'data' => [
                'users' => [
                    'total' => $totalUsers,
                    'admin' => $totalAdmins,
                    'user' => $totalRegularUsers,
                ],
                'tasks' => [
                    'total' => $totalTasks,
                    'completed' => $completedTasks,
                    'pending' => $pendingTasks,
                    'overdue' => $overdueTasks,
                ],
                'notes' => [
                    'total' => $totalNotes,
                ],
                'categories' => [
                    'total' => $totalCategories,
                ],
                'completion_percentage' => $completionPercentage,
                'recent_activities' => $recentActivities,
            ],
        ]);
    }
}
