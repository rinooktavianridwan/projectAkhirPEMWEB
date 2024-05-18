<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function create()
    {
        return view('transactions.create');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'car_id' => 'required|integer',
            'pickup_date' => 'required|date',
            'return_date' => 'required|date',
            'transaction_value' => 'required|numeric'
        ]);
    
        $transaction = Transaction::create($validatedData);
        return response()->json($transaction); 
    }
    // /get-booked-dates/' + carId,
    public function getBookedDates($carId)
    {
        $bookedDates = Transaction::where('car_id', $carId)->get();
        return response()->json($bookedDates);
    }
    
    
}