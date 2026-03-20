<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', [UserController::class, 'siginUp'])->name('register');
Route::get('/login', [UserController::class, 'signIn'])->name('login');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    });
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('user/dashboard', function () {
        return view('user.index');
    });
});
