<?php

namespace App\Http\Controllers;

use App\Fixture;
use App\Result;
use Illuminate\Http\Request;

class MatchController extends Controller
{

    public function playWeek(Request $request)
    {
        $this->startMatch(Fixture::where('league_week', $request->week)->get());
        return redirect('/?week=' . $request->week);
    }

    public function playAll()
    {
        $this->startMatch(Fixture::all());
        return redirect('/?week=' . Fixture::TOTAL_WEEK);
    }

    public function startMatch($matchList)
    {
        foreach ($matchList as $match) {
            $isPlay = Result::where('fixture_id', $match->id)->first();
            if ($isPlay) {
                break;
            } else {
                $this->matchResult($match);
            }
        }
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
