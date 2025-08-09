<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'Index'])->name('index');

Route::get('/dashboard', [UserController::class, 'Dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
// Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

Route::middleware('auth', 'admin')->group(function () {

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
