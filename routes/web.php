<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Auth Routes
Route::get('/', [AuthController::class, 'index'])->name('auth.index');

Route::prefix('auth')->group(function () {
    Route::get('/login', function() {
        return View('login');
    });
});

Route::redirect('/', '/auth/login');

// Home Routes
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

// User Routes
Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
Route::get('register', [UserController::class, 'register'])->name('user.register');
Route::post('user', [UserController::class, 'store'])->name('user.create');
