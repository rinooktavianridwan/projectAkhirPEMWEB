<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TransactionController;

//perlu auth

Route::get('/get-cars', [CarController::class, 'getCars'])->middleware(['auth', 'verified']);

Route::get('/get-unique-categories', [CarController::class, 'getUniqueCategories'])->middleware(['auth', 'verified']);

Route::get('/get-unique-cities', [CarController::class, 'getUniqueCities'])->middleware(['auth', 'verified']);

Route::get('/get-unique-statuses', [CarController::class, 'getUniqueStatuses'])->middleware(['auth', 'verified']);

Route::get('/get-unavailable-dates/{carId}', [CarController::class, 'getUnavailableDates'])->middleware(['auth', 'verified']);

Route::get('/get-transactions-by-user/{userId}/{status}', [TransactionController::class, 'getTransactionsByStatusUser'])->middleware(['auth', 'verified']);

Route::get('/admin/transactions/{status}', [TransactionController::class, 'getTransactionsByStatus'])->middleware(['auth', 'verified'])->name('transactions.status');

Route::get('/admin/summary', [TransactionController::class, 'getSummary'])->middleware(['auth', 'verified'])->name('summary');

Route::get('/myorder', function () {
    $user = auth()->user();
    return view('layouts.myorder', ['user' => $user]);
})->middleware(['auth', 'verified'])->name('myorder');

Route::get('/get-transactions-by-user/{userId}', [TransactionController::class, 'getTransactionsByUser']);

Route::get('/cars', function () {

    $user = auth()->user();
    return view('layouts.cars', ['user' => $user]);
})->middleware(['auth', 'verified'])->name('cars');

Route::get('/aboutUs', function () {
    return view('layouts.aboutUs');
})->middleware(['auth', 'verified'])->name('aboutUs');

Route::get('/admin', function () {
    $totalTransactionValue = \App\Models\Transaction::sum('transaction_value');
    $banyakTransaksi = \App\Models\Transaction::count();
    $transactions = \App\Models\Transaction::all();
    return view('admin.homeAdmin', ['total' => $totalTransactionValue, 'banyakTransaksi' => $banyakTransaksi], ['transactions' => $transactions]);
})->middleware(['auth', 'verified',])->name('admin');

Route::get('/siadmin', function () {
    return view('admin.siadmin');
})->middleware(['auth', 'verified'])->name('siadmin');

Route::get('/kendaraan', function () {
    return view('admin.admin');
})->middleware(['auth', 'verified'])->name('kendaraan');

Route::post('/add-car', [CarController::class, 'addCar'])->middleware(['auth', 'verified']);

Route::post('/edit-car/{id}', [CarController::class, 'editCar'])->middleware(['auth', 'verified']);

Route::delete('/delete-car/{id}', [CarController::class, 'deleteCar'])->middleware(['auth', 'verified']);

Route::post('/delete-image', [CarController::class, 'deleteImage'])->middleware(['auth', 'verified']);

Route::post('/save-transaction', [TransactionController::class, 'saveTransaction'])->name('save.transaction')->middleware(['auth', 'verified']);

Route::post('/transactions', [TransactionController::class, 'store'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




//ga perlu
Route::get('/', function () {
    return view('layouts.Guest.indexGuest');
});

Route::get('/dashboard', function () {
    return view('layouts.Guest.indexGuest');
})->name('dashboard');


require __DIR__ . '/auth.php';
