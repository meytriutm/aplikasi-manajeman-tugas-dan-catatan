<?php

use Illuminate\Support\Facades\Route;

// Menampilkan halaman login NoteTask
Route::get('/', function () {
    return view('auth.login');
})->name('login');

// Menampilkan halaman registrasi
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Menampilkan halaman dashboard User
Route::get('/dashboard', function () {
    return view('user.dashboard');
})->name('user.dashboard');

// Halaman logout
Route::get('/auth/logout', function () {
    return view('auth.logout');
});

// Balik ke halaman login
Route::get('/auth/login', function () {
    return view('auth.login');
});

// Halaman profil pengguna
Route::get('/profile', function () {
    return view('profile.index');
});

// Halaman informasi profil pengguna
Route::get('/profile/information', function () {
    return view('profile.information');
});

// Halaman daftar tugas
Route::get('/tasks', function () {
    return view('tasks.index');
});

// Halaman kategori
Route::get('/categories', function () {
    return view('categories.index');
});

// Halaman daftar catatan
Route::get('/notes', function () {
    return view('notes.index');
});

// Halaman untuk menambahkan catatan
Route::get('/notes/create', function () {
    return view('notes.detail', [
        'mode' => 'create',
    ]);
});

// Halaman detail catatan
Route::get('/notes/{id}', function ($id) {
    return view('notes.detail', [
        'mode' => 'show',
        'id' => $id,
    ]);
})->whereNumber('id');

// Halaman untuk mengedit catatan
Route::get('/notes/{id}/edit', function ($id) {
    return view('notes.detail', [
        'mode' => 'edit',
        'id' => $id,
    ]);
})->whereNumber('id');


// Menampilkan Dashboard Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Menampilkan halaman Manajemen User
Route::get('/admin/users', function () {
    return view('admin.users');
})->name('admin.users');
