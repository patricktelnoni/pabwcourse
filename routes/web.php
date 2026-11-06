<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// if(isset($_SESSION['username']))
// cek login dengan session
Route::middleware('auth')->group(function () {
    Route::get('/produks', [ProdukController::class, 'index'])->name('produks');
    Route::get('/produks/create', [ProdukController::class, 'create'])->name('produks.add');
    Route::post('/produks/store', [ProdukController::class, 'store'])->name('produks.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
