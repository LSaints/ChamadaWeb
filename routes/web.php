<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DisciplineController;

// Auth Routes
Route::get('/', [AuthController::class, 'index'])->name('auth.index');

Route::prefix('auth')->group(function () {
    Route::get('/login', function() {
        return View('login');
    });
});

Route::redirect('/', '/auth/login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::redirect('/logout', '/auth/login');

// Home Routes
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

// User Routes
Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
Route::get('register', [UserController::class, 'register'])->name('user.register');
Route::post('user', [UserController::class, 'store'])->name('user.create');


// Discipline Routes
Route::post('/discipline', [DisciplineController::class, 'create'])->name('discipline.create');
Route::get('disciplines/teacher', [DisciplineController::class, 'getDisciplineByTeacherId'])->name('disciplines.byTeacher');
Route::post('/disciplines/{disciplineId}/add', [DisciplineController::class, 'AddDisciplineToStudent'])->name('discipline.AddDisciplineToStudent');
