<?php

use App\Http\Controllers\BayarController;
use App\Http\Controllers\MahasiswaController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/template', function () {
    return view('layouts.template');
})->middleware(['auth', 'verified'])->name('template');

Route::resource('mahasiswa', MahasiswaController:: class);
Route::resource('bayar', BayarController:: class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('mahasiswa', MahasiswaController:: class);
Route::get('bayar', [BayarController::class, 'index']);
Route::get('bayar/cre', [BayarController::class, 'index']);
Route::get('bayar/edit', [BayarController::class, 'index']);
Route::get('mahasiswa', [MahasiswaController::class, 'index']);
Route::get('mahasiswa/cre', [MahasiswaController::class, 'index']);

require __DIR__.'/auth.php';
