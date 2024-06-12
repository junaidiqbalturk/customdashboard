<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\AdminController;

Route::get('/', function () {
    return view('auth.register');
});

// Breeze routes
Route::get('register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Auth::routes();

//User Dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//admin routes 
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('user.dashboard');
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware(App\Http\Middleware\AdminMiddleware::class)->name('admin.dashboard');
});
