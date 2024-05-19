<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;

//perlu auth

Route::get('/get-cars', function () {
    return app()->call('App\Http\Controllers\CarController@getCars');
})->middleware(['auth', 'verified']);

Route::get('/get-unique-categories', function () {
    return app()->call('App\Http\Controllers\CarController@getUniqueCategories');
})->middleware(['auth', 'verified']);

Route::get('/get-unique-cities', function () {
    return app()->call('App\Http\Controllers\CarController@getUniqueCities');
})->middleware(['auth', 'verified']);

Route::get('/get-unique-statuses', function () {
    return app()->call('App\Http\Controllers\CarController@getUniqueStatuses');
})->middleware(['auth', 'verified']);

Route::get('/get-unavailable-dates/{carId}', function ($carId) {
    return app()->call('App\Http\Controllers\CarController@getUnavailableDates', ['carId' => $carId]);
})->middleware(['auth', 'verified']);

Route::get('/get-transactions-by-user/{userId}/{status}', function ($userId, $status) {
        return app()->call('App\Http\Controllers\TransactionController@getTransactionsByStatusUser', ['userId' => $userId, 'status' => $status]);
})->middleware(['auth', 'verified']);

Route::get('/admin/transactions/{status}', function ($status) {
    $isAdmin = \App\Models\Admin::where('email', Auth::user()->email)->first();;
    if ($isAdmin) {
        return app()->call('App\Http\Controllers\TransactionController@getTransactionsByStatus', ['status' => $status]);
    } else {
        return redirect()->route('dashboard');
    }
})->middleware(['auth', 'verified'])->name('transactions.status');

Route::get('/admin/summary', function () {
    $isAdmin = \App\Models\Admin::where('email', Auth::user()->email)->first();;
    if ($isAdmin) {
        return app()->call('App\Http\Controllers\TransactionController@getSummary');
    } else {
        return redirect()->route('dashboard');
    }
})->middleware(['auth', 'verified'])->name('summary');


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
    $isAdmin = \App\Models\Admin::where('email', Auth::user()->email)->first();;
    if ($isAdmin) {
        return view('admin.homeAdmin', ['total' => $totalTransactionValue, 'banyakTransaksi' => $banyakTransaksi], ['transactions' => $transactions]);
    }
    else {
        return redirect()->route('dashboard');
    }
})->middleware(['auth', 'verified',])->name('admin');

Route::get('/siadmin', function () {
    return view('admin.siadmin');
})->middleware(['auth', 'verified'])->name('siadmin');

Route::get('/kendaraan', function () {
    $isAdmin = \App\Models\Admin::where('email', Auth::user()->email)->first();;
    if ($isAdmin) {
        return view('admin.admin');
    }
    else {
        return redirect()->route('dashboard');
    }
})->middleware(['auth', 'verified'])->name('kendaraan');

route::post('/add-car', function () {
    $isAdmin = \App\Models\Admin::where('email', Auth::user()->email)->first();;
    if ($isAdmin) {
        return app()->call('App\Http\Controllers\CarController@addCar');
    } else {
        return redirect()->route('dashboard');
    }
})->middleware(['auth', 'verified']);

route::post('/edit-car/{id}', function ($id) {
    $isAdmin = \App\Models\Admin::where('email', Auth::user()->email)->first();;
    if ($isAdmin) {
        return app()->call('App\Http\Controllers\CarController@editCar', ['id' => $id]);
    } else {
        return redirect()->route('dashboard');
    }
})->middleware(['auth', 'verified']);

route::delete('/delete-car/{id}', function ($id) {
    $isAdmin = \App\Models\Admin::where('email', Auth::user()->email)->first();;
    if ($isAdmin) {
        return app()->call('App\Http\Controllers\CarController@deleteCar', ['id' => $id]);
    } else {
        return redirect()->route('dashboard');
    }
})->middleware(['auth', 'verified']);

route::post('/delete-image', function () {
    $isAdmin = \App\Models\Admin::where('email', Auth::user()->email)->first();;
    if ($isAdmin) {
        return app()->call('App\Http\Controllers\CarController@deleteImage');
    } else {
        return redirect()->route('dashboard');
    }
})->middleware(['auth', 'verified']);

route::post('/save-transaction', function () {
    $isAdmin = \App\Models\Admin::where('email', Auth::user()->email)->first();;
    if ($isAdmin) {
        return app()->call('App\Http\Controllers\TransactionController@saveTransaction');
    } else {
        return redirect()->route('dashboard');
    }
})->name('save.transaction')->middleware(['auth', 'verified']);

route::post('/transactions', function () {
    $isAdmin = \App\Models\Admin::where('email', Auth::user()->email)->first();;
    if ($isAdmin) {
        return app()->call('App\Http\Controllers\TransactionController@store');
    } else {
        return redirect()->route('dashboard');
    }
})->middleware(['auth', 'verified']);

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
