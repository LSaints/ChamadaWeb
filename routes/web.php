<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('login');
});

Route::prefix('auth')->group(function () {
    Route::get('/login', function() {
        return View('login');
    });
});

Route::redirect('/', '/auth/login');

Route::get('register', function () {
    return View('register');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('profile', function () {
    return View('profile');
});

