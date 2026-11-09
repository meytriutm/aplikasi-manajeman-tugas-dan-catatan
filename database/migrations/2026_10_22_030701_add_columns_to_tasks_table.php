
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Fungsi untuk menambahkan kolom yang dibutuhkan tabel tasks
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            // Menyimpan ID pengguna yang memiliki tugas
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Menghubungkan tugas dengan kategori yang dipilih
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
                ->nullOnDelete();

            // Menyimpan judul tugas
            $table->string('title');

            // Menyimpan deskripsi atau penjelasan tugas
            $table->text('description')->nullable();

            // Menyimpan status tugas, yaitu pending atau completed
            $table->enum('status', ['pending', 'completed'])
                ->default('pending');

            // Menyimpan tingkat prioritas tugas
            $table->enum('priority', ['low', 'medium', 'high'])
                ->default('medium');

            // Menyimpan tanggal batas penyelesaian tugas
            $table->date('due_date')->nullable();
        });
    }

    // Fungsi untuk membatalkan perubahan pada tabel tasks
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            // Menghapus relasi ke tabel users dan categories
            $table->dropForeign(['user_id']);
            $table->dropForeign(['category_id']);

            // Menghapus kolom tambahan yang dibuat
            $table->dropColumn([
                'user_id',
                'category_id',
                'title',
                'description',
                'status',
                'priority',
                'due_date'
            ]);
        });
    }
};
