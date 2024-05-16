<?php
// CarController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    // CarController.php

public function getCars()
{
    return response()->json(Car::all());
}

public function addCar(Request $request)
{
    $car = Car::create($request->all());
    return response()->json($car);
}

public function editCar(Request $request, $id)
{
    $car = Car::findOrFail($id);
    $car->update($request->all());
    return response()->json($car);
}

public function deleteCar($id)
{
    $car = Car::findOrFail($id);
    $car->delete();
    return response()->json(null, 204);
}

}
