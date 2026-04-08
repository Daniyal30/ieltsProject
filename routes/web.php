<?php

use App\Http\Controllers\admin\LectureController;
use App\Http\Controllers\admin\SidebarController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/signUp', [UserController::class, 'signUp'])->name('signUp');
Route::get('/signIn', [UserController::class, 'signIn'])->name('signIn');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.index');
    Route::resource('/sidebar', SidebarController::class);
    Route::resource('/student', StudentController::class);
    Route::resource('/lecture', LectureController::class);
    Route::post('/admin/sidebar/{sidebar}/toggle', [SidebarController::class, 'statusUpdate'])->name('sidebar.toggle');
    Route::post('/sidebar/bulk-destroy', [SidebarController::class, 'bulkDestroy'])->name('sidebar.bulk-destroy');
    Route::get('/index', [HomeController::class, 'index'])->name('index');
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('user/dashboard', function () {
        return view('user.index');
    })->name('user.index');
});
