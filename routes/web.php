<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/artikel', function () {
    return view('artikel.artikel');
})->name('artikel');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard');

Route::get('/unggahan', function () {
    return view('dashboard.unggahan');
})->name('unggahan');

Route::get('/redeem', function () {
    return view('dashboard.redeem');
})->name('redeem');
Route::get('/profile-edit', function () {
    return view('dashboard.profile-edit');
})->name('profile-edit');

Route::get('/artikel', function () {
    return view('artikel.artikel');
})->name('artikel');

Route::get('/user-profile', function () {
    return view('user-profile.profile');
})->name('user-profile');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
