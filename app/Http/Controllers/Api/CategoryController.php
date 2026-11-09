<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan semua kategori milik pengguna yang sedang login
    public function index(Request $request)
    {
        // Mengambil kategori berdasarkan pengguna yang sedang login
        $categories = Category::where('user_id', $request->user()->id)
            ->latest()
            ->get();

        // Mengirim daftar kategori dalam format JSON
        return response()->json([
            'message' => 'Daftar kategori berhasil diambil',
            'data' => $categories,
        ]);
    }

    // Menyimpan kategori baru milik pengguna yang sedang login
    public function store(Request $request)
    {
        // Memeriksa apakah nama, icon dan warna kategori sudah sesuai
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'nullable|string|max:7',
            'icon' => 'nullable|string|max:50',
        ]);

        // Membuat kategori untuk pengguna yang sedang login
        $category = Category::create([
            'user_id' => $request->user()->id,
            'name' => $validated['name'],
            'color' => $validated['color'] ?? '#808080',
            'icon' => $validated['icon'] ?? null,
        ]);

        // Mengirim respons jika kategori berhasil dibuat
        return response()->json([
            'message' => 'Kategori berhasil ditambahkan',
            'data' => $category,
        ], 201);
    }

    // Menampilkan satu kategori milik pengguna yang sedang login
    public function show(Request $request, string $id)
    {
        // Mencari kategori berdasarkan ID dan pemiliknya
        $category = Category::where('user_id', $request->user()->id)
            ->findOrFail($id);

        // Mengirim detail kategori dalam format JSON
        return response()->json([
            'message' => 'Detail kategori berhasil diambil',
            'data' => $category,
        ]);
    }

    // Mengubah kategori milik pengguna yang sedang login
    public function update(Request $request, string $id)
    {
        // Mencari kategori berdasarkan ID dan pemiliknya
        $category = Category::where('user_id', $request->user()->id)
            ->findOrFail($id);

        // Memeriksa data yang ingin diubah
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'color' => 'sometimes|nullable|string|max:7',
            'icon' => 'sometimes|nullable|string|max:50',
        ]);

        // Menyimpan perubahan kategori
        $category->update($validated);

        // Mengirim respons setelah kategori berhasil diubah
        return response()->json([
            'message' => 'Kategori berhasil diperbarui',
            'data' => $category,
        ]);
    }

    // Menghapus kategori milik pengguna yang sedang login
    public function destroy(Request $request, string $id)
    {
        // Mencari kategori berdasarkan ID dan pemiliknya
        $category = Category::where('user_id', $request->user()->id)
            ->findOrFail($id);

        // Menghapus kategori dari database
        $category->delete();

        // Mengirim respons setelah kategori berhasil dihapus
        return response()->json([
            'message' => 'Kategori berhasil dihapus',
        ]);
    }
}
