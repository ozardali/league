<?php

namespace App\Http\Controllers;

use App\Fixture;
use App\Team;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $fixtures = Fixture::orderBy('league_week', 'ASC')->get();
        return view('home')
            ->with('fixtures', $fixtures)
            ->with('teams', $teams);

    }
}
