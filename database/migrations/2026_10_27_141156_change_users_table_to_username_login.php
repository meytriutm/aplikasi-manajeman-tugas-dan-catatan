<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Mengubah login dari email menjadi username.
     */
    public function up(): void
    {
        // Tambahkan kolom username terlebih dahulu.
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->unique();
        });

        // Admin pertama yang sudah ada dijadikan akun "administrator".
        $admin = DB::table('users')
            ->where('role', 'admin')
            ->orderBy('id')
            ->first();

        if ($admin) {
            DB::table('users')
                ->where('id', $admin->id)
                ->update(['username' => 'administrator']);
        }

        // Isi username untuk akun lama lainnya berdasarkan ID.
        DB::table('users')
            ->whereNull('username')
            ->orderBy('id')
            ->get()
            ->each(function ($user) {
                DB::table('users')
                    ->where('id', $user->id)
                    ->update(['username' => 'user' . $user->id]);
            });

        // Jadikan username wajib diisi.
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable(false)->change();
        });

        // Hapus kolom yang khusus digunakan untuk email.
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['email']);
            $table->dropColumn([
                'email',
                'email_verified_at',
            ]);
        });

        // Hapus tabel reset password berbasis email.
        Schema::dropIfExists('password_reset_tokens');
    }

    /**
     * Membatalkan perubahan migration.
     */
    public function down(): void
    {
        // Kembalikan kolom email.
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
        });

        // Hapus username.
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['username']);
            $table->dropColumn('username');
        });

        // Kembalikan tabel reset password.
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }
};