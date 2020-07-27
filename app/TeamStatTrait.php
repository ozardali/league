<?php

namespace App;

trait TeamStatTrait
{

    public function played()
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

    public function won()
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

    public function lost()
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

    public function goalFor()
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

    public function goalAgainst()
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

    public function getHomeMatches()
    {
        return Fixture::where('home_team', $this->id)->get();
    }

    public function getAwayMatches()
    {
        return Fixture::where('away_team', $this->id)->get();
    }
}
