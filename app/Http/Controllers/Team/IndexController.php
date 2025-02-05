<?php

namespace App\Http\Controllers\Team;

use App\Models\Team;
use App\Models\Country;
use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {

        // Жадная загрузка данных по процессору
        $teams = Team::with('country')->get();
        // dd($teams);
        return view('teams.index', compact('teams'));
    }
}
