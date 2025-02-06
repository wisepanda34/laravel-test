<?php

namespace App\Http\Controllers\Team;

use App\Models\Team;
use App\Models\Country;
use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Team $team)
    {
        $validated = $request->validate(); // в классе UpdateRequest прописано правило для валидации 

        $team->update([
            'title' => $validated['title'],
            'country_id' => $validated['country_id'],
        ]);

        $team->achievements()->sync($validated['achievements'] ?? []);

        return redirect()->route('teams.index')->with('success', 'Team updated successfully!');
    }
}
