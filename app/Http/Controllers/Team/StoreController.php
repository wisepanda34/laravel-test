<?php

namespace App\Http\Controllers\Team;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $validated = $request->validate(); // в классе StoreRequest прописано правило для валидации 

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
