<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FixtureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('fixtures')->truncate();
        $now = \Carbon\Carbon::now();
        DB::table('fixtures')->insert(array (

            0 =>
                array (
                    'id' => 1,
                    'home_team' => '1',
                    'away_team' => '2',
                    'league_week' => '1',
                    'created_at' => $now,
                    'updated_at' => $now,
                ),
            1 =>
                array (
                    'id' => 2,
                    'home_team' => '2',
                    'away_team' => '1',
                    'league_week' => '4',
                    'created_at' => $now,
                    'updated_at' => $now,
                ),
            2 =>
                array (
                    'id' => 3,
                    'home_team' => '3',
                    'away_team' => '4',
                    'league_week' => '1',
                    'created_at' => $now,
                    'updated_at' => $now,
                ),
            3 =>
                array (
                    'id' => 4,
                    'home_team' => '4',
                    'away_team' => '3',
                    'league_week' => '4',
                    'created_at' => $now,
                    'updated_at' => $now,
                ),
            4 =>
                array (
                    'id' => 5,
                    'home_team' => '1',
                    'away_team' => '3',
                    'league_week' => '2',
                    'created_at' => $now,
                    'updated_at' => $now,
                ),
            5 =>
                array (
                    'id' => 6,
                    'home_team' => '3',
                    'away_team' => '1',
                    'league_week' => '5',
                    'created_at' => $now,
                    'updated_at' => $now,
                ),
            6 =>
                array (
                    'id' => 7,
                    'home_team' => '2',
                    'away_team' => '4',
                    'league_week' => '2',
                    'created_at' => $now,
                    'updated_at' => $now,
                ),
            7 =>
                array (
                    'id' => 8,
                    'home_team' => '4',
                    'away_team' => '2',
                    'league_week' => '5',
                    'created_at' => $now,
                    'updated_at' => $now,
                ),
            8 =>
                array (
                    'id' => 9,
                    'home_team' => '1',
                    'away_team' => '4',
                    'league_week' => '3',
                    'created_at' => $now,
                    'updated_at' => $now,
                ),
            9 =>
                array (
                    'id' => 10,
                    'home_team' => '4',
                    'away_team' => '1',
                    'league_week' => '6',
                    'created_at' => $now,
                    'updated_at' => $now,
                ),
            10 =>
                array (
                    'id' => 11,
                    'home_team' => '2',
                    'away_team' => '3',
                    'league_week' => '3',
                    'created_at' => $now,
                    'updated_at' => $now,
                ),
            11 =>
                array (
                    'id' => 12,
                    'home_team' => '3',
                    'away_team' => '2',
                    'league_week' => '6',
                    'created_at' => $now,
                    'updated_at' => $now,
                )
        ));

    }
}
