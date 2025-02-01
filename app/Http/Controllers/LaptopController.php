<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\Proccesor;
use App\Models\Specialty;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    public function index()
    {
        // Жадная загрузка данных по процессору
        $laptops = Laptop::with('proccesor')->get();
        return view('laptop.index', compact('laptops'));
    }

    public function create()
    {
        $proccesors = Proccesor::all();
        $specialties = Specialty::all();
        return view('laptop.create', compact('proccesors', 'specialties'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brend' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'proccesor_id' => 'required|exists:proccesors,id', // Проверка на существование процессора
            'specialties' => 'array',
            'specialties.*' => 'exists:specialties,id', // Каждое значение должно существовать в БД
        ]);

        $laptop = Laptop::create([
            'brend' => $validated['brend'],
            'model' => $validated['model'],
            'proccesor_id' => $validated['proccesor_id'] ?? null,
        ]);

        if (!empty($validated['specialties'])) {
            $laptop->specialties()->attach($validated['specialties']);
        }

        return redirect()->route('laptops.index')->with('success', 'Laptop added successfully!');
    }


    public function show(Laptop $laptop)
    {
        $laptop->load('proccesor', 'specialties');
        return view('laptop.show', compact('laptop'));
    }

    public function edit(Laptop $laptop)
    {
        $proccesors = Proccesor::all();
        $specialties = Specialty::all();
        return view('laptop.edit', compact('laptop', 'proccesors', 'specialties'));
    }

    public function update(Request $request, Laptop $laptop)
    {
        $validated = $request->validate([
            'brend' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'proccesor_id' => 'required|exists:proccesors,id', // Проверка на существование процессора
            'specialties' => 'array',
            'specialties.*' => 'exists:specialties,id', // Каждое значение должно существовать в БД
        ]);

        $laptop->update([
            'brend' => $validated['brend'],
            'model' => $validated['model'],
            'proccesor_id' => $validated['proccesor_id'],
        ]);

        $laptop->specialties()->sync($validated['specialties'] ?? []);

        return redirect()->route('laptops.index')->with('success', 'Laptop updated successfully!');
    }

    public function destroy(Laptop $laptop)
    {
        $laptop->delete();
        return redirect()->route('laptops.index')->with('success', 'Laptop deleted successfully!');
    }

    public function trashed()
    {
        $laptops = Laptop::onlyTrashed()->with('proccesor')->get();
        return view('laptop.trashed', compact('laptops'));
    }

    public function restore($id)
    {
        $laptop = Laptop::onlyTrashed()->findOrFail($id);
        $laptop->restore();
        return redirect()->route('laptops.index')->with('success', 'Laptop restored successfully!');
    }
}
