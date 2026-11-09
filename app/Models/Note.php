<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Note extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi saat membuat atau mengubah catatan
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'content',
    ];

    // Menghapus file fisik lampiran sebelum catatan dihapus
    protected static function booted(): void
    {
        static::deleting(function (Note $note) {
            foreach ($note->attachments as $attachment) {
                Storage::disk('public')->delete($attachment->file_path);
            }
        });
    }

    // Setiap catatan dimiliki oleh satu pengguna
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Catatan bisa memiliki satu kategori atau tidak memiliki kategori
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Satu catatan bisa memiliki banyak lampiran
    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }
}
