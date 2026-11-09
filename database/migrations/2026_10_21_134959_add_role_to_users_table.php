<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // ini tu buat nambahin kolom role ke tabel users
    public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        // Menambahkan kolom role untuk membedakan Admin dan User
        // Kalau tidak diisi, role pengguna otomatis menjadi user
        $table->string('role')->default('user')->after('password');
    });
}

    // ini buat hapus kolom role kalo perubahan migration dibatalin
    public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        // Menghapus kolom role dari tabel users
        $table->dropColumn('role');
    });
}
};
