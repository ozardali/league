<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('home_team');
            $table->unsignedBigInteger('away_team');
            $table->unsignedBigInteger('league_week');
            $table->timestamps();
        });

        Schema::table('fixtures', function (Blueprint $table) {
            $table->foreign('home_team')->references('id')->on('teams');
            $table->foreign('away_team')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixtures');
    }
}
