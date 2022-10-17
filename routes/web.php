<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;

Route::get('/', [SessionController::class, 'create'])->name('login');

Route::post('/login', [SessionController::class, 'store']);

Route::get('/register', [UserController::class, 'signup']);

Route::post('/register', [UserController::class, 'store']);

Route::middleware('auth')->group(function() {
    Route::get('/logout', [SessionController::class, 'destroy']);

    Route::get('/users/{user}/toggle-activity', [UserController::class, 'toggleActivity']);

    Route::resource('users', UserController::class)->except('show');
});
