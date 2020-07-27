<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    const TEAM_COUNT = 4;

    protected $appends = [
        'played',
        'won',
        'drawn',
        'lost',
        'points',
        'goal_for',
        'goal_against',
        'goal_difference',
    ];

    public function getPointsAttribute()
    {
        return (($this->getWonAttribute() * 3) + ($this->getDrawnAttribute() * 1));;
    }

    public function getPlayedAttribute()
    {
        $played = 0;
        $result = Fixture::where('home_team', $this->id)->orWhere('away_team', $this->id)->get();
        foreach ($result as $result) {
            if (Result::where('fixture_id', $result->id)->count()) {
                $played++;
            }
        }
        return $played;
    }

    public function getWonAttribute()
    {
        $won = 0;
        foreach ($this->getHomeMatches() as $homeTeamMatch) {
            $result = Result::where('fixture_id', $homeTeamMatch->id)->first();
            if ($result['home_goal'] > $result['away_goal'])
                $won++;
        }
        foreach ($this->getAwayMatches() as $awayTeamMatch) {
            $result = Result::where('fixture_id', $awayTeamMatch->id)->first();
            if ($result['away_goal'] > $result['home_goal'])
                $won++;
        }
        return $won;
    }

    public function getDrawnAttribute()
    {
        $drawn = $this->getPlayedAttribute() - ($this->getLostAttribute() + $this->getWonAttribute());
        return $drawn;
    }

    public function getLostAttribute()
    {
        $lost = 0;
        foreach ($this->getHomeMatches() as $homeTeamMatch) {
            $result = Result::where('fixture_id', $homeTeamMatch->id)->first();
            if ($result['home_goal'] < $result['away_goal'])
                $lost++;
        }
        foreach ($this->getAwayMatches() as $awayTeamMatch) {
            $result = Result::where('fixture_id', $awayTeamMatch->id)->first();
            if ($result['away_goal'] < $result['home_goal'])
                $lost++;
        }
        return $lost;
    }

    public function getGoalForAttribute()
    {
        $gf = 0;
        foreach ($this->getHomeMatches() as $homeTeamMatch) {
            $result = Result::where('fixture_id', $homeTeamMatch->id)->first();
            $gf += $result['home_goal'];
        }
        foreach ($this->getAwayMatches() as $awayTeamMatch) {
            $result = Result::where('fixture_id', $awayTeamMatch->id)->first();
            $gf += $result['away_goal'];
        }
        return $gf;
    }

    public function getGoalAgainstAttribute()
    {
        $ga = 0;
        foreach ($this->getHomeMatches() as $homeTeamMatch) {
            $result = Result::where('fixture_id', $homeTeamMatch->id)->first();
            $ga += $result['away_goal'];
        }
        foreach ($this->getAwayMatches() as $awayTeamMatch) {
            $result = Result::where('fixture_id', $awayTeamMatch->id)->first();
            $ga += $result['home_goal'];
        }
        return $ga;
    }

    public function getGoalDifferenceAttribute()
    {
       return $this->getGoalForAttribute() - $this->getGoalAgainstAttribute();

    }


    public function getHomeMatches()
    {
        return Fixture::where('home_team', $this->id)->get();
    }

    public function getAwayMatches()
    {
        return Fixture::where('away_team', $this->id)->get();
    }

}
