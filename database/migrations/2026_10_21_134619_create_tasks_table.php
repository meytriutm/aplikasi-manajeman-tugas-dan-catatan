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
        // Membuat tabel tasks untuk menyimpan data tugas pengguna
        Schema::create('tasks', function (Blueprint $table) {
            // sebagai pk
            $table->id();
            // mencatat waktu data dibuat dan diperbarui
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus tabel tasks jika tabelnya ada
        Schema::dropIfExists('tasks');
    }
};
