<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NoteController extends Controller
{
    // Menampilkan semua catatan milik pengguna yang sedang login
    public function index(Request $request)
    {
        $notes = Note::where('user_id', $request->user()->id)
            ->with(['category', 'attachments'])
            ->latest()
            ->get();

        return response()->json([
            'message' => 'Daftar catatan berhasil diambil',
            'data' => $notes,
        ]);
    }

    // Menyimpan catatan baru
    public function store(Request $request)
    {
        // Memeriksa data catatan sebelum disimpan
        $validated = $request->validate([
            'category_id' => [
                'nullable',
                'integer',
                Rule::exists('categories', 'id')
                    ->where('user_id', $request->user()->id),
            ],
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Membuat catatan untuk pengguna yang sedang login
        $note = Note::create([
            'user_id' => $request->user()->id,
            'category_id' => $validated['category_id'] ?? null,
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        // Mencatat aktivitas saat catatan ditambahkan
        ActivityLog::create([
            'user_id' => $request->user()->id,
            'activity_type' => 'note_created',
            'description' => 'Menambahkan catatan: ' . $note->title,
            'note_id' => $note->id,
        ]);

        // Mengambil data kategori dan lampiran jika tersedia
        $note->load(['category', 'attachments']);

        return response()->json([
            'message' => 'Catatan berhasil ditambahkan',
            'data' => $note,
        ], 201);
    }

    // Menampilkan detail satu catatan
    public function show(Request $request, string $id)
    {
        $note = Note::where('user_id', $request->user()->id)
            ->with(['category', 'attachments'])
            ->findOrFail($id);

        return response()->json([
            'message' => 'Detail catatan berhasil diambil',
            'data' => $note,
        ]);
    }

    // Mengubah catatan milik pengguna yang sedang login
    public function update(Request $request, string $id)
    {
        $note = Note::where('user_id', $request->user()->id)
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
            'content' => 'sometimes|required|string',
        ]);

        // Menyimpan perubahan data catatan
        $note->update($validated);

        // Mencatat aktivitas saat catatan diubah
        ActivityLog::create([
            'user_id' => $request->user()->id,
            'activity_type' => 'note_updated',
            'description' => 'Mengubah catatan: ' . $note->title,
            'note_id' => $note->id,
        ]);

        $note->load(['category', 'attachments']);

        return response()->json([
            'message' => 'Catatan berhasil diperbarui',
            'data' => $note,
        ]);
    }

    // Menghapus catatan milik pengguna yang sedang login
    public function destroy(Request $request, string $id)
    {
        $note = Note::where('user_id', $request->user()->id)
            ->findOrFail($id);

        // Menyimpan informasi sebelum catatan dihapus
        $noteId = $note->id;
        $noteTitle = $note->title;
        $userId = $request->user()->id;

        // Menghapus catatan dari database
        $note->delete();

        // Mencatat aktivitas penghapusan catatan
        ActivityLog::create([
            'user_id' => $userId,
            'activity_type' => 'note_deleted',
            'description' => 'Menghapus catatan: ' . $noteTitle,
            'note_id' => null,
        ]);

        return response()->json([
            'message' => 'Catatan berhasil dihapus',
        ]);
    }
}
