<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Car;
use Carbon\Carbon;

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

        $car = Car::find($request->car_id);
        $car->status = 'Tidak Tersedia';
        $car->save();
    
        $transaction = Transaction::create($validatedData);
        return response()->json($transaction); 
    }
    // /get-booked-dates/' + carId,
    public function getBookedDates($carId)
    {
        $bookedDates = Transaction::where('car_id', $carId)->get();
        return response()->json($bookedDates);
    } 

    public function getTransactionsByStatus($status)
    {
        $transactions = Transaction::with('user', 'car')->get();

        switch ($status) {
            case 'booked':
                $filteredTransactions = $transactions->filter(function ($transaction) {
                    return now() < $transaction->pickup_date;
                });
                break;
            case 'ongoing':
                $filteredTransactions = $transactions->filter(function ($transaction) {
                    return now() >= $transaction->pickup_date && now() < $transaction->return_date;
                });
                break;
            case 'done':
                $filteredTransactions = $transactions->filter(function ($transaction) {
                    return now() >= $transaction->return_date;
                });
                break;
            default:
                $filteredTransactions = collect();
                break;
        }

        return response()->json($filteredTransactions->values()->toArray());
    }

    public function getTransactionsByStatusUser($userId, $status)
    {
        $transactions = Transaction::where('user_id', $userId)->get();

        $filteredTransactions = $transactions->filter(function($transaction) use ($status) {
            $now = Carbon::now();
            if ($status == 'ongoing') {
                return $now->between($transaction->pickup_date, $transaction->return_date);
            } elseif ($status == 'done') {
                return $now->isAfter($transaction->return_date);
            } elseif ($status == 'booked') {
                return $now->isBefore($transaction->pickup_date);
            }
            return false;
        });

        // Konversi ke array numerik
        $filteredTransactions = $filteredTransactions->values()->all();

        return response()->json($filteredTransactions);
    }



    public function getSummary()
    {
        $transactions = Transaction::with('user', 'car')->get();

        $summary = [
            'total_orders' => $transactions->count(),
            'total_sales' => $transactions->sum('transaction_value'),
            'booked' => [
                'count' => $transactions->filter(function ($transaction) {
                    return now() < $transaction->pickup_date;
                })->count(),
                'sales' => $transactions->filter(function ($transaction) {
                    return now() < $transaction->pickup_date;
                })->sum('transaction_value')
            ],
            'ongoing' => [
                'count' => $transactions->filter(function ($transaction) {
                    return now() >= $transaction->pickup_date && now() < $transaction->return_date;
                })->count(),
                'sales' => $transactions->filter(function ($transaction) {
                    return now() >= $transaction->pickup_date && now() < $transaction->return_date;
                })->sum('transaction_value')
            ],
            'done' => [
                'count' => $transactions->filter(function ($transaction) {
                    return now() >= $transaction->return_date;
                })->count(),
                'sales' => $transactions->filter(function ($transaction) {
                    return now() >= $transaction->return_date;
                })->sum('transaction_value')
            ],
        ];

        return response()->json($summary);
    }
    function getTransactionsByUser($userId)
    {
        
        // kembalikan dalam bentuk array
        $transactions = Transaction::where('user_id', $userId)->get()->toArray();
        return response()->json($transactions);


        
    }
     
}