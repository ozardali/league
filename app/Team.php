<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use TeamStatTrait;

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
        return (($this->getWonAttribute() * 3) + ($this->getDrawnAttribute() * 1));
    }

    public function getPlayedAttribute()
    {
        return $this->played();
    }

    public function getWonAttribute()
    {
        return $this->won();
    }

    public function getDrawnAttribute()
    {
        return $this->getPlayedAttribute() - ($this->getLostAttribute() + $this->getWonAttribute());
    }

    public function getLostAttribute()
    {
        return $this->lost();
    }

    public function getGoalForAttribute()
    {
        return $this->goalFor();
    }

    public function getGoalAgainstAttribute()
    {
        return $this->goalAgainst();
    }

    public function getGoalDifferenceAttribute()
    {
        return $this->getGoalForAttribute() - $this->getGoalAgainstAttribute();
    }


}
