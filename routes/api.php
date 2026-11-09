<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\NoteController;
use App\Http\Controllers\Api\AttachmentController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\AdminDashboardController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProfileController;

// Registrasi akun pengguna
Route::post('/register', [AuthController::class, 'register']);

// Login menggunakan username dan password
Route::post('/login', [AuthController::class, 'login']);

// Route yang hanya bisa diakses setelah login dengan Sanctum
Route::middleware('auth:sanctum')->group(function () {

    // Mengambil data pengguna yang sedang login
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Mengubah nama dan kata sandi pengguna yang sedang login
    Route::patch('/profile', [ProfileController::class, 'update']);

    // Logout dan menghapus token akses saat ini
    Route::post('/logout', [AuthController::class, 'logout']);

    // CRUD kategori
    Route::apiResource('categories', CategoryController::class);

    // CRUD tugas
    Route::apiResource('tasks', TaskController::class);

    // CRUD catatan
    Route::apiResource('notes', NoteController::class);

    // Mengambil daftar lampiran
    Route::get('/attachments', [AttachmentController::class, 'index']);

    // Mengunggah lampiran
    Route::post('/attachments', [AttachmentController::class, 'store']);

    // Melihat detail lampiran
    Route::get('/attachments/{id}', [AttachmentController::class, 'show']);

    // Menghapus lampiran
    Route::delete('/attachments/{id}', [AttachmentController::class, 'destroy']);

    // Dashboard statistik milik pengguna yang login
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Menyimpan langganan notifikasi browser (Web Push)
    Route::post('/push/subscribe', function (Request $request) {
        $request->validate([
            'endpoint'    => 'required|url',
            'keys.p256dh' => 'required|string',
            'keys.auth'   => 'required|string',
        ]);

        $request->user()->updatePushSubscription(
            $request->endpoint,
            $request->input('keys.p256dh'),
            $request->input('keys.auth')
        );

        return response()->json(['message' => 'Notifikasi diaktifkan.']);
    });

    // Dashboard statistik khusus Admin
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->middleware('admin');

    // Manajemen pengguna khusus Admin
    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/users', [UserController::class, 'index']);
        Route::delete('/users/{user}', [UserController::class, 'destroy']);
    });
});