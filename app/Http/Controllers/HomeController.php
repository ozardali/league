<?php

namespace App\Http\Controllers;

use App\Fixture;
use App\Result;
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
        $weekFixtures = Fixture::where('league_week', $week)->get();
        $fixtures = Fixture::orderBy('league_week', 'ASC')->get();



        return view('home')
            ->with('weekFixtures', $weekFixtures)
            ->with('fixtures', $fixtures)
            ->with('teams', $teams)
            ->with('week', $week);
    }

    public function playWeek(Request $request)
    {
        $matchList = Fixture::where('league_week', $request->week)->get();

        foreach ($matchList as $match) {
            $isPlay = Result::where('fixture_id', $match->id)->first();
            if ($isPlay) {
                break;
            } else {
                $this->matchResult($match);
            }
        }
        return redirect('/?week=' . $request->week);
    }

    public function playAll()
    {
        $matchList = Fixture::all();
        foreach ($matchList as $match) {
            $isPlay = Result::where('fixture_id', $match->id)->first();
            if ($isPlay) {
                break;
            } else {
                $this->matchResult($match);
            }
        }
        return redirect('/?week='. Fixture::TOTAL_WEEK);
    }

    public function matchResult($match)
    {
        $homeGoal = 0;
        $awayGoal = 0;
        if ($match->homeTeam->strength > $match->awayTeam->strength) {
            $homeGoal += random_int(1, 50) / 10;
            $awayGoal += random_int(1, 30) / 10;
        }
        if ($match->homeTeam->strength < $match->awayTeam->strength) {
            $homeGoal += random_int(1, 40) / 10;
            $awayGoal += random_int(1, 30) / 10;
        }
        if ($match->homeTeam->strength == $match->awayTeam->strength) {
            $homeGoal += random_int(1, 40) / 10;
            $awayGoal = $homeGoal;
        }
        $result = new Result();
        $result->fixture_id = $match->id;
        $result->home_goal = $homeGoal;
        $result->away_goal = $awayGoal;
        $result->save();
    }
}
