<?php

namespace App\Http\Controllers\Team;

use App\Models\Team;
use App\Models\Country;
use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    public function __invoke(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team deleted successfully!');
    }
}
