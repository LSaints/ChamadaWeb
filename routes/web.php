<?php

use Illuminate\Support\Facades\Route;

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

Route::get('home', function () {
    return View('home');
});

Route::get('profile', function () {
    return View('profile');
});

