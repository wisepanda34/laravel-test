<?php

namespace App\Http\Controllers;

use App\Models\Car;


use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function deleted_cars()
    {
        $cars = Car::onlyTrashed()->get();
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $data = request()->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'color' => 'nullable|string',
            'price' => 'required|integer'
        ]);
        Car::create($data);
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'color' => 'nullable|string',
            'price' => 'required|integer'
        ]);

        $post = Car::findOrFail($id);

        $post->update($request->all());

        return redirect()->route('cars.index')->with('success', 'Car updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $car = Car::findOrFail($id);
            $car->delete();

            return redirect()->route('cars.index')->with('success', 'car успешно удален!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Произошла ошибка при удалении car: ' . $e->getMessage());
        }
    }
}
