
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // buat tabel categories di database
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            // Kolom id sebagai primary key kategori
            $table->id();

            // nyimpan id pengguna yang membuat kategori
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            // nyimpan nama kategori, misalnya Sekolah atau Pribadi
            $table->string('name');

            // nyimpan kode warna kategori agar bisa dibedakan
            $table->string('color', 7)->default('#808080');

            // nambahin kolom created_at dan updated_at
            $table->timestamps();
        });
    }

    // ini buat apus tabel categories klo migration dibatalkan
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
