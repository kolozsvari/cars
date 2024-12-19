<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        return response()->json(Car::with('owner')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'license_plate' => 'required|string|max:255|unique:cars',
            'owner_id' => 'required|exists:owners,id',
        ]);

        $car = Car::create($validated);
        return response()->json($car, 201); 
    }

    public function show($id)
    {
        $car = Car::with('owner')->find($id);
        if(!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }
        return response()->json($car);
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $validated = $request->validate([
            'brand' => 'sometimes|required|string|max:255',
            'model' => 'sometimes|required|string|max:255',
            'license_plate' => 'sometimes|required|string|max:255|unique:cars,license_plate,' . $car->id,
            'owner_id' => 'sometimes|required|exists:owners,id',
        ]);

        $car->update($validated);
        return response()->json($car);
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return response()->json(null, 204);
    }
}