<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/get-cars', [CarController::class, 'getCars']);

Route::post('/add-car', [CarController::class, 'addCar']);
Route::post('/edit-car/{id}', [CarController::class, 'editCar']);
Route::delete('/delete-car/{id}', [CarController::class, 'deleteCar']);
Route::post('/delete-image', [CarController::class, 'deleteImage']);


Route::get('/', function () {
    return view('layouts.Guest.indexGuest');
});

Route::get('/dashboard', function () {
    return view('layouts.Guest.indexGuest');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/cars', function () {
    return view('layouts.cars');
})->middleware(['auth', 'verified'])->name('cars');



Route::get('/aboutUs', function () {
    return view('layouts.aboutUs');
})->middleware(['auth', 'verified'])->name('aboutUs');

// admin

Route::get('/admin', function () {
    return view('admin.homeAdmin');
})->middleware(['auth', 'verified'])->name('admin');

Route::get('/siadmin', function () {
    return view('admin.siadmin');
})->middleware(['auth', 'verified'])->name('siadmin');

Route::get('/kendaraan', function () {
    return view('admin.admin');
})->middleware(['auth', 'verified'])->name('kendaraan');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
