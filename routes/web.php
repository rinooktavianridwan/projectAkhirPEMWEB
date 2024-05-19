<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TransactionController;

Route::get('/get-cars', [CarController::class, 'getCars']);

Route::post('/add-car', [CarController::class, 'addCar']);
Route::post('/edit-car/{id}', [CarController::class, 'editCar']);
Route::delete('/delete-car/{id}', [CarController::class, 'deleteCar']);
Route::post('/delete-image', [CarController::class, 'deleteImage']);

Route::get('/get-unique-categories', [CarController::class, 'getUniqueCategories']);
Route::get('/get-unique-cities', [CarController::class, 'getUniqueCities']);
Route::get('/get-unique-statuses', [CarController::class, 'getUniqueStatuses']);

Route::post('/save-transaction', [TransactionController::class, 'saveTransaction'])->name('save.transaction');
Route::get('/get-unavailable-dates/{carId}', [CarController::class, 'getUnavailableDates']);


Route::get('/get-transactions', 'TransactionController@getTransactions');

// web.php
Route::get('/admin/transactions/{status}', [TransactionController::class, 'getTransactionsByStatus'])->name('transactions.status');

// summary
Route::get('/admin/summary', [TransactionController::class, 'getSummary'])->name('summary');



// buat /transactions
Route::post('/transactions', [TransactionController::class, 'store']);

Route::get('/', function () {
    return view('layouts.Guest.indexGuest');
});

Route::get('/dashboard', function () {
    return view('layouts.Guest.indexGuest');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/cars', [CarController::class, 'index'])->middleware(['auth', 'verified'])->name('cars');

Route::get('/cars', function () {
    
    $user = auth()->user();
    return view('layouts.cars', ['user' => $user]);
})->middleware(['auth', 'verified',])->name('cars');






Route::get('/aboutUs', function () {
    return view('layouts.aboutUs');
})->middleware(['auth', 'verified'])->name('aboutUs');

// admin


Route::get('/admin', function () {
    $totalTransactionValue = \App\Models\Transaction::sum('transaction_value');
    $banyakTransaksi = \App\Models\Transaction::count();
    $transactions = \App\Models\Transaction::all();
    return view('admin.homeAdmin', ['total' => $totalTransactionValue , 'banyakTransaksi' => $banyakTransaksi], ['transactions' => $transactions]);
})->middleware(['auth', 'verified',])->name('admin');


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
