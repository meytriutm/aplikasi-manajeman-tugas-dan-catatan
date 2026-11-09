<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use NotificationChannels\WebPush\HasPushSubscriptions;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasPushSubscriptions;

    // Kolom yang boleh diisi saat membuat atau mengubah pengguna
    protected $fillable = [
        'name',
        'username',
        'password',
        'role',
    ];

    // Kolom yang tidak ditampilkan saat data pengguna menjadi JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Mengatur tipe data beberapa kolom pengguna
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // Memeriksa apakah pengguna adalah admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Satu pengguna bisa memiliki banyak kategori
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    // Satu pengguna bisa memiliki banyak tugas
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    // Satu pengguna bisa memiliki banyak catatan
    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }
}