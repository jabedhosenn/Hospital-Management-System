<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'Index'])->name('index');
Route::get('/view_doctors', [UserController::class, 'viewDoctors'])->name('view_doctors');
Route::post('/appointment', [UserController::class, 'MakeAppointment'])->name('appointment');

Route::get('/dashboard', [UserController::class, 'Dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/add_doctors', [AdminController::class, 'addDoctors'])
    ->name('add_doctors');
    Route::post('/add_doctors', [AdminController::class, 'postAddDoctors'])
    ->name('post_doctors');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
