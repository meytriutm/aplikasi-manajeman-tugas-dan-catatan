<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Task extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi saat membuat atau mengubah tugas
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'status',
        'priority',
        'due_date',
    ];

    // Mengatur tipe data kolom tanggal
    protected function casts(): array
    {
        return [
            'due_date' => 'date',
        ];
    }

    // Menghapus file fisik lampiran sebelum tugas dihapus
    protected static function booted(): void
    {
        static::deleting(function (Task $task) {
            foreach ($task->attachments as $attachment) {
                Storage::disk('public')->delete($attachment->file_path);
            }
        });
    }

    // Setiap tugas dimiliki oleh satu pengguna
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Tugas bisa memiliki satu kategori atau tidak memiliki kategori
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Satu tugas bisa memiliki banyak lampiran
    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }
}
