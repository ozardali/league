<?php

namespace App\Http\Controllers;

use App\Fixture;
use App\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $week = $request->week ? $request->week : 1;
        if ($request->week > Fixture::TOTAL_WEEK) {
            return \redirect(route('route.home'));
        }
        $teams = Team::all();
        $weekFixtures = $this->fixture($week);
        $fixtures = $this->fixture(null);

        return view('home')
            ->with('weekFixtures', $weekFixtures)
            ->with('fixtures', $fixtures)
            ->with('teams', $teams)
            ->with('week', $week);
    }

    public function fixture($week)
    {
        $query = Fixture::with(['homeTeam', 'awayTeam']);
        if ($week) {
            $query = $query->where('league_week', $week)->get();
        } else {
            $query = $query->orderBy('league_week', 'ASC')->get();
        }
        return $query;
    }
}
