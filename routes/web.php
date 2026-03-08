<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/users/access', function () {
    return Inertia::render('Users/Access');
})->name('users.access');

// Public registration (from landing page)
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Keep existing front-end links working
Route::get('/register1', fn () => redirect()->route('users.create'))->name('register.friendly');
Route::get('/forgot-pwd1', fn () => redirect()->route('login'))->name('password.request.legacy');

// Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])
    ->middleware('throttle:6,1')
    ->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected user management dashboard
Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/index', fn () => redirect()->route('users.index'));
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});