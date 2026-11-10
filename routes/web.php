<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Route Halaman Utama (Form Login)
Route::get('/', [PageController::class, 'showLogin'])->name('login');

// Route Proses Login & Logout
Route::post('/login', [PageController::class, 'processLogin'])->name('login.process');
Route::get('/logout', [PageController::class, 'logout'])->name('logout');

// Route Halaman Aplikasi (Menerima parameter request username)
Route::get('/dashboard', [PageController::class, 'showDashboard'])->name('dashboard');
Route::get('/pengelolaan', [PageController::class, 'showPengelolaan'])->name('pengelolaan');
Route::get('/profile', [PageController::class, 'showProfile'])->name('profile');