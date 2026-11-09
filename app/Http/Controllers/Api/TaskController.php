<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class TaskController extends Controller
{
    // Menampilkan semua tugas milik pengguna yang sedang login
    public function index(Request $request)
    {
        // Mengambil tugas berdasarkan ID pengguna
        $tasks = Task::where('user_id', $request->user()->id)
            ->with('category')
            ->with('attachments')
            ->latest()
            ->get();

        // Mengirim daftar tugas dalam format JSON
        return response()->json([
            'message' => 'Daftar tugas berhasil diambil',
            'data' => $tasks,
        ]);
    }

    // Menyimpan tugas baru
    public function store(Request $request)
    {
        // Memeriksa data tugas sebelum disimpan
        $validated = $request->validate([
            'category_id' => [
                'nullable',
                'integer',
                Rule::exists('categories', 'id')
                    ->where('user_id', $request->user()->id),
            ],
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => ['sometimes', Rule::in(['pending', 'completed'])],
            'priority' => ['sometimes', Rule::in(['low', 'medium', 'high'])],
            'due_date' => 'nullable|date',
        ]);

        // Membuat tugas untuk pengguna yang sedang login
        $task = Task::create([
            'user_id' => $request->user()->id,
            'category_id' => $validated['category_id'] ?? null,
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'status' => $validated['status'] ?? 'pending',
            'priority' => $validated['priority'] ?? 'medium',
            'due_date' => $validated['due_date'] ?? null,
        ]);

        // Mengambil data kategori dan lampiran jika tersedia
        $task->load(['category', 'attachments']);

        // Mencatat aktivitas saat pengguna menambahkan tugas
        ActivityLog::create([
            'user_id' => $request->user()->id,
            'activity_type' => 'task_created',
            'description' => 'Menambahkan tugas: ' . $task->title,
            'task_id' => $task->id,
        ]);

        // Mengirim respons setelah tugas berhasil dibuat
        return response()->json([
            'message' => 'Tugas berhasil ditambahkan',
            'data' => $task,
        ], 201);
    }

    // Menampilkan detail satu tugas
    public function show(Request $request, string $id)
    {
        // Mencari tugas yang dimiliki pengguna yang sedang login
        $task = Task::where('user_id', $request->user()->id)
            ->with(['category', 'attachments'])
            ->findOrFail($id);

        // Mengirim detail tugas dalam format JSON
        return response()->json([
            'message' => 'Detail tugas berhasil diambil',
            'data' => $task,
        ]);
    }

    // Mengubah data tugas
    public function update(Request $request, string $id)
    {
        // Mencari tugas berdasarkan ID dan pemiliknya
        $task = Task::where('user_id', $request->user()->id)
            ->findOrFail($id);

        // Memeriksa data yang ingin diubah
        $validated = $request->validate([
            'category_id' => [
                'sometimes',
                'nullable',
                'integer',
                Rule::exists('categories', 'id')
                    ->where('user_id', $request->user()->id),
            ],
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'status' => ['sometimes', Rule::in(['pending', 'completed'])],
            'priority' => ['sometimes', Rule::in(['low', 'medium', 'high'])],
            'due_date' => 'sometimes|nullable|date',
        ]);

        // Menyimpan perubahan data tugas
        $task->update($validated);

        // Mengambil data kategori dan lampiran terbaru
        $task->load(['category', 'attachments']);

        // Mencatat aktivitas saat pengguna mengubah tugas
        ActivityLog::create([
            'user_id' => $request->user()->id,
            'activity_type' => 'task_updated',
            'description' => 'Mengubah tugas: ' . $task->title,
            'task_id' => $task->id,
        ]);

        // Mengirim respons setelah tugas berhasil diperbarui
        return response()->json([
            'message' => 'Tugas berhasil diperbarui',
            'data' => $task,
        ]);
    }
    
    // Menghapus tugas milik pengguna yang sedang login
    public function destroy(Request $request, string $id)
    {
        // Mencari tugas berdasarkan ID dan pemiliknya
        $task = Task::where('user_id', $request->user()->id)
            ->findOrFail($id);

        // Simpan informasi tugas sebelum dihapus
        $taskId = $task->id;
        $taskTitle = $task->title;
        $userId = $request->user()->id;

        // Menghapus tugas dari database
        $task->delete();

        // Mencatat aktivitas penghapusan tugas
        ActivityLog::create([
            'user_id' => $userId,
            'activity_type' => 'task_deleted',
            'description' => 'Menghapus tugas: ' . $taskTitle,
            'task_id' => null,
        ]);

        // Mengirim respons setelah tugas berhasil dihapus
        return response()->json([
            'message' => 'Tugas berhasil dihapus',
        ]);
    }

}
