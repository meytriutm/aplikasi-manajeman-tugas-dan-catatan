<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Fungsi untuk menambahkan kolom lampiran tugas dan catatan
    public function up(): void
    {
        Schema::table('attachments', function (Blueprint $table) {
            // Menghubungkan lampiran dengan tugas, boleh kosong
            $table->foreignId('task_id')
                ->nullable()
                ->constrained('tasks')
                ->cascadeOnDelete();

            // Menghubungkan lampiran dengan catatan, boleh kosong
            $table->foreignId('note_id')
                ->nullable()
                ->constrained('notes')
                ->cascadeOnDelete();

            // Menyimpan nama asli file lampiran
            $table->string('file_name');

            // Menyimpan lokasi file di penyimpanan aplikasi
            $table->string('file_path');

            // Menyimpan jenis file, misalnya image/jpeg atau application/pdf
            $table->string('file_type')->nullable();

            // Menyimpan ukuran file dalam satuan byte
            $table->unsignedBigInteger('file_size')->nullable();
        });
    }

    // Fungsi untuk membatalkan penambahan kolom lampiran
    public function down(): void
    {
        Schema::table('attachments', function (Blueprint $table) {
            // Menghapus relasi lampiran dengan tugas dan catatan
            $table->dropForeign(['task_id']);
            $table->dropForeign(['note_id']);

            // Menghapus kolom tambahan yang sudah dibuat
            $table->dropColumn([
                'task_id',
                'note_id',
                'file_name',
                'file_path',
                'file_type',
                'file_size',
            ]);
        });
    }
};