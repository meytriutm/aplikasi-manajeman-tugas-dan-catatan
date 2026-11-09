<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // untuk mendaftarkan akun pengguna baru
    public function register(Request $request)
    {
        // Memeriksa apakah data pendaftaran sudah sesuai
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:50|alpha_dash|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Menyimpan akun baru ke tabel users
        $user = User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
        ]);

        // Membuat token untuk autentikasi API
        $token = $user->createToken('auth_token')->plainTextToken;

        // Mengirim respons klo pendaftaran berhasil
        return response()->json([
            'message' => 'Pendaftaran berhasil',
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    // untuk login menggunakan username dan password
    public function login(Request $request)
    {
        // Memeriksa data login yang dikirim pengguna
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Mencari akun berdasarkan username
        $user = User::where('username', $validated['username'])->first();

        // Memeriksa apakah akun ditemukan dan password cocok
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['Username atau password salah.'],
            ]);
        }

        // Membuat token untuk pengguna yang berhasil login
        $token = $user->createToken('auth_token')->plainTextToken;

        // Mengirim token dan informasi pengguna
        return response()->json([
            'message' => 'Login berhasil',
            'user' => $user,
            'token' => $token,
        ]);
    }

    // untuk logout dan menghapus token yang sedang digunakan
    public function logout(Request $request)
    {
        // Menghapus token Sanctum yang dipakai pada permintaan ini
        $request->user()->currentAccessToken()->delete();

        // Mengirim pesan logout berhasil
        return response()->json([
            'message' => 'Logout berhasil',
        ]);
    }
}
