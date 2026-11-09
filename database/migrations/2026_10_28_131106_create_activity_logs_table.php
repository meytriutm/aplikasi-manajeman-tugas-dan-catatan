<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Membuat tabel untuk mencatat aktivitas pengguna.
     */
    public function up(): void
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            // ID utama untuk setiap catatan aktivitas
            $table->id();

            // Pengguna yang melakukan aktivitas
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Jenis aktivitas yang dilakukan
            $table->string('activity_type', 100);

            // Penjelasan aktivitas
            $table->text('description');

            // Hubungkan ke tugas jika aktivitas berkaitan dengan tugas
            $table->foreignId('task_id')
                ->nullable()
                ->constrained('tasks')
                ->nullOnDelete();

            // Hubungkan ke catatan jika aktivitas berkaitan dengan catatan
            $table->foreignId('note_id')
                ->nullable()
                ->constrained('notes')
                ->nullOnDelete();

            // Waktu aktivitas dicatat
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Menghapus tabel jika migration dibatalkan.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
