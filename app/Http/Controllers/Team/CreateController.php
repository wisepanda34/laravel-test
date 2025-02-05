<?php

namespace App\Http\Controllers\Team;

use App\Models\Team;
use App\Models\Country;
use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        $countries = Country::all();
        $achievements = Achievement::all();
        return view('teams.create', compact('countries', 'achievements'));
    }
}
