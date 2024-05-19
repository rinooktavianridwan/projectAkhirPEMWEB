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
    // // /get-booked-dates/' + carId,
    // public function getBookedDates($carId)
    // {
    //     $bookedDates = Transaction::where('car_id', $carId)->get();
    //     return response()->json($bookedDates);
    // } 

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
    // function getCalendarData($car_id)
    // {
    //     $transactions = Transaction::where('car_id', $car_id)->get();
    //     $calendarData = [];
    //     $tanggalTidakTersedia = [];
    
    //     foreach ($transactions as $transaction) {
    //         // Hitung berapa hari selisih antara tanggal mulai dan tanggal selesai
    //         $diff = $transaction->pickup_date->diffInDays($transaction->return_date);
    //         // Ambil tanggal mulai
    //         $start = $transaction->pickup_date->format('d');
    //         // Ambil angka bulan
    //         $month = $transaction->pickup_date->format('m');
    
    //         // Pastikan ada array untuk bulan ini, jika belum ada inisialisasi sebagai array kosong
    //         if (!array_key_exists($month, $calendarData)) {
    //             $calendarData[$month] = [];
    //         }
    
    //         // Tambahkan semua tanggal transaksi ke dalam array
    //         for ($i = 0; $i <= $diff; $i++) {
    //             $date = $start + $i;
    //             // Jika tanggal melebihi 31, atur ulang untuk kasus bulan selanjutnya
    //             if ($date > 31) {
    //                 // Menambahkan logika untuk handle tanggal yang melebihi batas bulan
    //                 $next_month = sprintf('%02d', intval($month) + 1);
    //                 if (!array_key_exists($next_month, $calendarData)) {
    //                     $calendarData[$next_month] = [];
    //                 }
    //                 $calendarData[$next_month][] = sprintf('%02d', $date % 31);
    //             } else {
    //                 $calendarData[$month][] = sprintf('%02d', $date);
    //             }
    //         }
    //     }

    //     // format calendarData menjadi seperti ini '2022-12-25'
    //     foreach ($calendarData as $month => $dates) {
    //         foreach ($dates as $date) {
    //             $tanggalTidakTersedia[] = '2022-' . $month . '-' . $date;
    //         }
    //     }
    
    //     return response()->json($tanggalTidakTersedia);
    // }

        public function getCalendarData($car_id)
    {
        $transactions = Transaction::where('car_id', $car_id)->get();
        $unavailableDates = [];

        foreach ($transactions as $transaction) {
            $start = Carbon::parse($transaction->pickup_date);
            $end = Carbon::parse($transaction->return_date);
            for ($date = $start; $date->lte($end); $date->addDay()) {
                $unavailableDates[] = $date->format('Y-m-d');
            }
        }

        return response()->json($unavailableDates);
    }

    
     
}