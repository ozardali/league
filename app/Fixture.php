<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{

    public function homeTeam()
    {
        return $this->hasOne(Team::class, 'id', 'home_team');
    }

    public function awayTeam()
    {
        return $this->hasOne(Team::class, 'id', 'away_team');
    }
}
