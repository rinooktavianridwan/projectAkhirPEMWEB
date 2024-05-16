<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.Guest.indexGuest');
});

Route::get('/dashboard', function () {
    return view('layouts.Guest.indexGuest');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/cars', function () {
    return view('layouts.cars');
})->middleware(['auth', 'verified'])->name('cars');

Route::get('/admin', function () {
    return view('admin.admin');
})->middleware(['auth', 'verified'])->name('admin');

Route::get('/aboutUs', function () {
    return view('layouts.aboutUs');
})->middleware(['auth', 'verified'])->name('aboutUs');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
