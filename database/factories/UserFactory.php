<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Factory untuk membuat data pengguna secara otomatis.
 *
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * Password default untuk data pengguna pengujian.
     */
    protected static ?string $password;

    /**
     * Menentukan data default pengguna.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'username' => fake()->unique()->userName(),
            'password' => static::$password ??= Hash::make('password'),
            'role' => 'user',
            'remember_token' => Str::random(10),
        ];
    }
}
