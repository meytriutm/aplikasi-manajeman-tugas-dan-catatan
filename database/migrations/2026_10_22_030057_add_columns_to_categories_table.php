<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // ini untuk buat kolom yang dibutuhkan tabel categories
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            // Menyimpan ID pengguna yang membuat kategori (dilewati jika sudah ada)
            if (!Schema::hasColumn('categories', 'user_id')) {
                $table->foreignId('user_id')
                    ->after('id')
                    ->constrained('users')
                    ->cascadeOnDelete();
            }

            // Menyimpan nama kategori (dilewati jika sudah ada)
            if (!Schema::hasColumn('categories', 'name')) {
                $table->string('name')->after('user_id');
            }

            // Menyimpan warna kategori (dilewati jika sudah ada)
            if (!Schema::hasColumn('categories', 'color')) {
                $table->string('color', 7)->default('#808080')->after('name');
            }
        });
    }

    // Dikosongkan karena kolom-kolom ini sudah dibuat di migration create_categories_table,
    // jadi rollback tidak boleh menghapusnya dari sini
    public function down(): void
    {
        //
    }
};