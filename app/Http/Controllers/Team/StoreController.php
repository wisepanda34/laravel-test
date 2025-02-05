<?php

namespace App\Http\Controllers\Team;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id', // Проверка на существование 
            'achievement' => 'array',
            'achievements.*' => 'exists:achievements,id', // Каждое значение должно существовать в БД
        ]);

        $team = Team::create([
            'title' => $validated['title'],
            'country_id' => $validated['country_id'] ?? null,
        ]);

        if (!empty($validated['achievements'])) {
            $team->achievements()->attach($validated['achievements']);
        }

        return redirect()->route('teams.index')->with('success', 'Team added successfully!');
    }
}
