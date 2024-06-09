<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SuperAdminController;
use App\Http\Controllers\Auth\AdminOrderController;
use App\Http\Controllers\Auth\AdminProfileController;
Route::get('/', function () {
    return view('auth.register');
});

// Breeze routes
Route::get('register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Auth::routes();

//User Dashboard
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// Admin dashboard
Route::get('/admin', [SuperAdminController::class, 'index'])->name('admin.dashboard')->middleware('role:admin');

// Add these routes in routes/web.php
Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile')->middleware('role:admin');
Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders')->middleware('role:admin');