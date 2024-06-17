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
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
//admin routes 
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('user.dashboard');
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware(App\Http\Middleware\AdminMiddleware::class)->name('admin.dashboard');
});
// Route for User Profile 
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
});

//Routes for Custom Orders Page 
Route::middleware(['auth'])->group(function () {
    Route::get('/custom-order', [App\Http\Controllers\OrderController::class, 'create'])->name('custom-order.create');
    Route::post('/custom-order', [App\Http\Controllers\OrderController::class, 'store'])->name('custom-order.store');
});

//test route 
Route::get('/test-log', function () {
    \Log::info('Test log entry');
    return 'Log entry created';
});