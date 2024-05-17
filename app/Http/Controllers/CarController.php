<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CarController extends Controller
{
    public function getCars()
    {
        return response()->json(Car::all());
    }

    public function addCar(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'city' => 'required',
            'status' => 'required',
            'price' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cars', 'public');
        }

        $car = Car::create([
            'name' => $request->name,
            'category' => $request->category,
            'image' => $imagePath,
            'city' => $request->city,
            'status' => $request->status,
            'price' => $request->price,
        ]);

        return response()->json($car);
    }

    public function editCar(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $dataToUpdate = [];

        if ($request->has('name') && $request->name !== $car->name) {
            $dataToUpdate['name'] = $request->name;
        }
        if ($request->has('category') && $request->category !== $car->category) {
            $dataToUpdate['category'] = $request->category;
        }
        if ($request->has('city') && $request->city !== $car->city) {
            $dataToUpdate['city'] = $request->city;
        }
        if ($request->has('status') && $request->status !== $car->status) {
            $dataToUpdate['status'] = $request->status;
        }
        if ($request->has('price') && $request->price !== $car->price) {
            $dataToUpdate['price'] = $request->price;
        }

        if ($request->hasFile('image')) {
            // Log image upload for debugging
            Log::info("Image found in request");

            $imagePath = $request->file('image')->store('cars', 'public');
            $dataToUpdate['image'] = $imagePath;

            // Delete the old image
            if (Storage::disk('public')->exists($car->image)) {
                Storage::disk('public')->delete($car->image);
            }
        }

        if (!empty($dataToUpdate)) {
            $car->update($dataToUpdate);
        }

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
}
