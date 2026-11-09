<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachment extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi saat menyimpan data lampiran
    protected $fillable = [
        'task_id',
        'note_id',
        'file_name',
        'file_path',
        'file_type',
        'file_size',
    ];

    // Field tambahan yang ikut dikirim di JSON
    protected $appends = ['url'];

    // Alamat file yang bisa dibuka langsung dari browser
    public function getUrlAttribute(): string
    {
        return '/storage/' . $this->file_path;
    }

    // Lampiran bisa terhubung dengan satu tugas
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    // Lampiran bisa terhubung dengan satu catatan
    public function note(): BelongsTo
    {
        return $this->belongsTo(Note::class);
    }
}