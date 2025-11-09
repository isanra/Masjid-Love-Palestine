<?php

use Illuminate\Support\Facades\Route;

// Import semua controller yang digunakan
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedeemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Rute Publik ---
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::post('/contact', [WelcomeController::class, 'storeContactMessage'])->name('contact.store');

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/user-profile/{user}', [ProfileController::class, 'show'])->name('user-profile.show');


// --- Rute yang Membutuhkan Login ---

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard Utama - Mengarah ke DashboardController@index -> view('dashboard.dashboard')
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // API Data Chart Dashboard
    Route::get('/dashboard/chart-data', [DashboardController::class, 'getChartData'])->name('dashboard.chart_data');

    // Halaman Unggahan - Mengarah ke PostController@index -> view('dashboard.unggahan') (Asumsi)
    // Pastikan PostController@index mengembalikan view yang benar ('dashboard.unggahan')
    Route::get('/dashboard/unggahan', [PostController::class, 'index'])->name('dashboard.unggahan');

    // Halaman Redeem - Mengarah ke RedeemController@index -> view('dashboard.redeem')
    Route::get('/redeem', [RedeemController::class, 'index'])->name('redeem.index');
    Route::post('/redeem', [RedeemController::class, 'store'])->name('redeem.store');
    // Route untuk menampilkan halaman redeem
    Route::get('/dashboard/redeem', [RedeemController::class, 'index'])->name('redeem.index');
// Route untuk memproses penukaran poin
    Route::post('/dashboard/redeem', [RedeemController::class, 'store'])->name('redeem.store');
    // Halaman Edit Profil - Mengarah ke ProfileController@edit -> view('profile.edit')
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- Fitur Postingan ---
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::resource('posts', PostController::class);
    Route::post('/posts/{post}/like', [PostController::class, 'toggleLike'])->name('posts.like');
    Route::post('/posts/{post}/save', [PostController::class, 'toggleSave'])->name('posts.save');
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('posts.comments.store');
    Route::post('/posts/{post}/share', [PostController::class, 'recordShare'])->name('posts.share');

    // Hapus rute duplikat atau salah yang mungkin masih ada
    // Route::get('/dashboard/dashboard', ...)  <-- Hapus ini
    // Route::get('/dashboard/redeem', ...) <-- Hapus ini
    // Route::get('/dashboard/profile-edit', ...) <-- Hapus ini
});


Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
// --- Rute Autentikasi Bawaan Breeze ---
require __DIR__.'/auth.php';