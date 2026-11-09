
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Fungsi untuk menambahkan kolom yang dibutuhkan tabel notes
    public function up(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            // Menghubungkan catatan dengan pengguna yang membuatnya
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Menghubungkan catatan dengan kategori, tetapi boleh kosong
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
                ->nullOnDelete();

            // Menyimpan judul catatan
            $table->string('title');

            // Menyimpan isi catatan yang bisa terdiri dari banyak teks
            $table->longText('content');
        });
    }

    // Fungsi untuk membatalkan perubahan pada tabel notes
    public function down(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            // Menghapus relasi ke tabel users dan categories
            $table->dropForeign(['user_id']);
            $table->dropForeign(['category_id']);

            // Menghapus kolom tambahan yang sudah dibuat
            $table->dropColumn([
                'user_id',
                'category_id',
                'title',
                'content'
            ]);
        });
    }
};
