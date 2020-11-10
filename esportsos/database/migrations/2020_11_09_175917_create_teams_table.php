<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //Unique team name.
            $table->string('name')->unique();
            //Unique abbreviation of the team name e.g. Astralis becomes ASTR
            $table->string('abbreviation')->unique();
            //The name of the coach for the team.
            $table->string('coach_name');
            //The coutry the team is representing/based in.
            $table->string('country');
            //Numerical rating based off previous performances.
            $table->float('rating');
            //Twitter username for the team.
            $table->string('twitter');
            //The name of the primary sponsor e.g. Nvidia
            $table->string('primary_sponsor');
            //The name of the secondary sponsor e.g. Razer
            $table->string('secondary_sponsor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}