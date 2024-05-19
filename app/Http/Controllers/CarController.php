<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CarController extends Controller
{
    public function getCars()
    {
        return response()->json(Car::all());
    }

    public function getUniqueCategories()
    {
        $categories = Car::distinct()->pluck('category');
        return response()->json($categories);
    }

    public function getUniqueCities()
    {
        $cities = Car::distinct()->pluck('city');
        return response()->json($cities);
    }

    public function getUniqueStatuses(){
        $statuses = Car::distinct()->pluck('status');
        return response()->json($statuses);
    }

    public function addCar(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'city' => 'required',
            'status' => 'nullable',
            'price' => 'required',
        ]);

        $status = $request->status ?? 'Tersedia';

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cars', 'public');
        }

        $car = Car::create([
            'name' => $request->name,
            'category' => $request->category,
            'image' => $imagePath,
            'city' => $request->city,
            'status' => $status,
            'price' => $request->price,
        ]);

        return response()->json($car);
    }

    public function editCar(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $imageName = $car->image;
        // print data json update pada console
        Log::info($request->all());
        // Validasi data
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'category' => 'sometimes|string|max:255',
            'city' => 'sometimes|string|max:255',
            'status' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Jika ada file gambar yang diupload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cars', 'public');
            $validatedData['image'] = $imagePath;

            // Hapus gambar lama jika ada
            if (Storage::disk('public')->exists($imageName)) {
                Storage::disk('public')->delete($imageName);
            }
        }

        // Mengisi atribut model dengan data yang tervalidasi
        $car->fill($validatedData);

        // Menyimpan perubahan ke database
        $car->save();

        return response()->json($car);
    }



    public function deleteImage(Request $request)
    {
        $imageName = $request->image;

        if (Storage::disk('public')->exists($imageName)) {
            Storage::disk('public')->delete($imageName);
            return response()->json(['message' => 'Image deleted successfully']);
        } else {
            return response()->json(['message' => 'Image not found'], 404);
        }
    }

    public function deleteCar($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return response()->json(null, 204);
    }

    public function index(Request $request)
    {
        $kategori = $request->input('kategori');
        $kota = $request->input('kota');

        $query = Car::query();

        if ($kategori) {
            $query->where('category', $kategori);
        }

        if ($kota) {
            $query->where('city', $kota);
        }

        $cars = $query->get();

        // Fetch unique categories and cities for the dropdowns
        $uniqueCategories = Car::select('category')->distinct()->pluck('category');
        $uniqueCities = Car::select('city')->distinct()->pluck('city');

        return view('layouts.cars', compact('cars', 'uniqueCategories', 'uniqueCities'));
    }

    public function getUnavailableDates($carId) {
        $unavailableDates = Transaction::where('car_id', $carId)->pluck('booking_date')->toArray();
        return response()->json($unavailableDates);
    }
    
}
