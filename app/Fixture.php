<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    const TOTAL_WEEK = 6;

    public function homeTeam()
    {
        return $this->hasOne(Team::class, 'id', 'home_team');
    }

    public function awayTeam()
    {
        return $this->hasOne(Team::class, 'id', 'away_team');
    }

    public function resultMatch()
    {
        return $this->hasOne(Result::class, 'fixture_id', 'id');
    }
}
