<?php

namespace App\Http\Controllers\Team;

use App\Models\Team;
use App\Models\Country;
use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke(Request $request, Team $team)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id', // Проверка на существование 
            'achievement' => 'array',
            'achievements.*' => 'exists:achievements,id', // Каждое значение должно существовать в БД
        ]);

        $team->update([
            'title' => $validated['title'],
            'country_id' => $validated['country_id'],
        ]);

        $team->achievements()->sync($validated['achievements'] ?? []);

        return redirect()->route('teams.index')->with('success', 'Team updated successfully!');
    }
}
