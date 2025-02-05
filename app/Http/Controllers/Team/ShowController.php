<?php

namespace App\Http\Controllers\Team;

use App\Models\Team;
use App\Models\Country;
use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(Team $team)
    {
        $team->load('country', 'achievements');
        return view('teams.show', compact('team'));
    }
}
