<?php

namespace App\Http\Controllers\Team;

use App\Models\Team;
use App\Models\Country;
use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke(Team $team)
    {
        $countries = Country::all();
        $achievements = Achievement::all();
        return view('teams.edit', compact('team', 'countries', 'achievements'));
    }
}
