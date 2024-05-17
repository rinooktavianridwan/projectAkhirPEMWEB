<?php
// CarController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\alert;

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
            'orderName' => 'required',
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
            'orderName' => $request->orderName,
            'price' => $request->price,
        ]);

        return response()->json($car);
    }

    public function editCar(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'city' => 'required',
            'status' => 'required',
            'orderName' => 'required',
            'price' => 'required',
        ]);

        $car = Car::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cars', 'public');
            $car->image = $imagePath;
        }
        

        $car->update([
            'name' => $request->name,
            'category' => $request->category,
            'city' => $request->city,
            'status' => $request->status,
            'orderName' => $request->orderName,
            'price' => $request->price,
        ]);

        return response()->json($car);
    }

    public function deleteImage(Request $request)
    {
        $imageName = $request->image;

        // Hapus gambar dari penyimpanan
        if (Storage::disk('public')->exists('cars/' . $imageName)) {
            alert("ada");
            Storage::disk('public')->delete('cars/' . $imageName);
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

