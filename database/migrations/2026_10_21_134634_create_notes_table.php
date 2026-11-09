<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         // Membuat tabel notes untuk menyimpan data catatan pengguna
        Schema::create('notes', function (Blueprint $table) {
            // sebagai pk
            $table->id();
            // Membuat kolom created_at dan updated_at mencatat waktu data dibuat dan diperbarui
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         // Menghapus tabel notes jika tabelnya ada
        Schema::dropIfExists('notes');
    }
};
