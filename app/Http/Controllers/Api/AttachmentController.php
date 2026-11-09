<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Task;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AttachmentController extends Controller
{
    // Menampilkan semua lampiran pengguna yang sedang login
    public function index(Request $request)
    {
        $userId = $request->user()->id;

        $attachments = Attachment::where(function ($query) use ($userId) {
            $query->whereHas('task', function ($taskQuery) use ($userId) {
                $taskQuery->where('user_id', $userId);
            })->orWhereHas('note', function ($noteQuery) use ($userId) {
                $noteQuery->where('user_id', $userId);
            });
        })->latest()->get();

        return response()->json([
            'message' => 'Daftar lampiran berhasil diambil',
            'data' => $attachments,
        ]);
    }

    // Mengunggah lampiran untuk tugas atau catatan
    public function store(Request $request)
    {
        // Memeriksa data lampiran yang dikirim
        $validated = $request->validate([
            'task_id' => 'nullable|integer|required_without:note_id',
            'note_id' => 'nullable|integer|required_without:task_id',
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,webp,bmp,pdf,doc,docx,xls,xlsx,csv,ppt,pptx,txt,rtf,odt,ods,odp,zip,rar,7z,mp3,wav,ogg,mp4,mov,avi,webm|max:10240',
        ]);

        // Memastikan hanya satu pemilik lampiran yang dipilih
        if (
            empty($validated['task_id']) === empty($validated['note_id'])
        ) {
            throw ValidationException::withMessages([
                'task_id' => [
                    'Pilih tepat satu tujuan lampiran: task_id atau note_id.',
                ],
            ]);
        }

        $userId = $request->user()->id;

        // Memastikan tugas memang milik pengguna yang login
        if (!empty($validated['task_id'])) {
            $parent = Task::where('user_id', $userId)
                ->findOrFail($validated['task_id']);
        } else {
            // Memastikan catatan memang milik pengguna yang login
            $parent = Note::where('user_id', $userId)
                ->findOrFail($validated['note_id']);
        }

        // Menyimpan file ke storage/app/public/attachments
        $file = $request->file('file');
        $path = $file->store('attachments', 'public');

        // Menyimpan informasi file ke tabel attachments
        $attachment = Attachment::create([
            'task_id' => $validated['task_id'] ?? null,
            'note_id' => $validated['note_id'] ?? null,
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'file_type' => $file->getMimeType(),
            'file_size' => $file->getSize(),
        ]);

        return response()->json([
            'message' => 'Lampiran berhasil diunggah',
            'data' => $attachment,
            'file_url' => asset('storage/' . $path),
        ], 201);
    }

    // Menampilkan detail lampiran milik pengguna yang login
    public function show(Request $request, string $id)
    {
        $attachment = Attachment::where(function ($query) use ($request) {
            $userId = $request->user()->id;

            $query->whereHas('task', function ($taskQuery) use ($userId) {
                $taskQuery->where('user_id', $userId);
            })->orWhereHas('note', function ($noteQuery) use ($userId) {
                $noteQuery->where('user_id', $userId);
            });
        })->findOrFail($id);

        return response()->json([
            'message' => 'Detail lampiran berhasil diambil',
            'data' => $attachment,
            'file_url' => asset('storage/' . $attachment->file_path),
        ]);
    }

    // Menghapus lampiran milik pengguna yang login
    public function destroy(Request $request, string $id)
    {
        $userId = $request->user()->id;

        $attachment = Attachment::where(function ($query) use ($userId) {
            $query->whereHas('task', function ($taskQuery) use ($userId) {
                $taskQuery->where('user_id', $userId);
            })->orWhereHas('note', function ($noteQuery) use ($userId) {
                $noteQuery->where('user_id', $userId);
            });
        })->findOrFail($id);

        // Menghapus file dari penyimpanan
        Storage::disk('public')->delete($attachment->file_path);

        // Menghapus informasi lampiran dari database
        $attachment->delete();

        return response()->json([
            'message' => 'Lampiran berhasil dihapus',
        ]);
    }
}
