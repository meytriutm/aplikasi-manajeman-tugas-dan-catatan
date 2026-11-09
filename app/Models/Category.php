<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi saat membuat atau mengubah kategori
    protected $fillable = [
        'user_id',
        'name',
        'color',
        'icon',
    ];

    // Setiap kategori dimiliki oleh satu pengguna
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Satu kategori bisa digunakan oleh banyak tugas
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    // Satu kategori bisa digunakan oleh banyak catatan
    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }
}