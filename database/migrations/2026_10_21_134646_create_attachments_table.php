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
        // // Membuat tabel attachments untuk menyimpan data lampiran
        Schema::create('attachments', function (Blueprint $table) {
            // kolom id sebagai primary key
            $table->id();
            //  // Membuat kolom created_at dan updated_at mencatat waktu data dibuat dan diperbarui
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { 
        // Menghapus tabel attachments jika tabelnya ada
        Schema::dropIfExists('attachments');
    }
};
