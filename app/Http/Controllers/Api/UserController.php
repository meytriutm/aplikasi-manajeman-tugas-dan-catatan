<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Daftar pengguna dengan pencarian, filter role, dan jumlah tugas
    public function index(Request $request)
    {
        $users = User::query()
            ->withCount([
                'tasks',
                'tasks as completed_tasks_count' => fn ($q) => $q->where('status', 'completed'),
            ])
            ->when($request->q, function ($query, $search) {
                $query->where(function ($w) use ($search) {
                    $w->where('name', 'like', "%{$search}%")
                      ->orWhere('username', 'like', "%{$search}%");
                });
            })
            ->when($request->role, fn ($query, $role) => $query->where('role', $role))
            ->latest()
            ->paginate(10);

        return response()->json([
            'message' => 'Daftar pengguna berhasil diambil',
            'summary' => [
                'total' => User::count(),
                'admin' => User::where('role', 'admin')->count(),
                'user'  => User::where('role', 'user')->count(),
            ],
            'data' => $users,
        ]);
    }

    // Menghapus akun pengguna beserta datanya
    public function destroy(Request $request, User $user)
    {
        if ($user->id === $request->user()->id) {
            return response()->json([
                'message' => 'Kamu tidak bisa menghapus akunmu sendiri.',
            ], 422);
        }

        // Hapus task dan note lewat Eloquent supaya event deleting jalan
        // dan file lampiran fisiknya ikut terhapus dari storage
        $user->tasks()->get()->each->delete();
        $user->notes()->get()->each->delete();

        $user->tokens()->delete();
        $user->delete();

        return response()->json([
            'message' => 'Akun pengguna berhasil dihapus',
        ]);
    }
}