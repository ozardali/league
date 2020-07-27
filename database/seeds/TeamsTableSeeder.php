<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    const TEAM_COUNT = 4;

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('teams')->truncate();
        for ($i = 1; $i <= self::TEAM_COUNT; $i++) {
            $now = \Carbon\Carbon::now();
            DB::table('teams')->insert([
                'name' => Str::random(6) . ' FC',
                'strength' => rand(30, 100),
                'created_at' => $now,
                'updated_at' => $now
            ]);

        }
    }
}
