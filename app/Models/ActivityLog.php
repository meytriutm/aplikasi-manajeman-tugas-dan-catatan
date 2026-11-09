<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    // Tabel ini hanya menyimpan created_at, tanpa updated_at
    public $timestamps = false;

    // Kolom yang boleh diisi saat mencatat aktivitas
    protected $fillable = [
        'user_id',
        'activity_type',
        'description',
        'task_id',
        'note_id',
        'created_at',
    ];

    // Mengatur tipe data kolom waktu
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
        ];
    }

    // Aktivitas ini dimiliki oleh satu pengguna
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Aktivitas bisa berkaitan dengan satu tugas
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    // Aktivitas bisa berkaitan dengan satu catatan
    public function note(): BelongsTo
    {
        return $this->belongsTo(Note::class);
    }
}
