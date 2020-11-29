<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //Points to one of the teams.
            $table->unsignedBigInteger('team1_id');
            //Points to one of the teams.
            $table->unsignedBigInteger('team2_id');
            // The match that proceeds this match (the one it feeds the winning team into).
            $table->unsignedBigInteger('child_match_id')->nullable();
            //The datetime when the match was scheduled to start.
            $table->dateTime('date_time');
            //The datetime when the match actually started.
            $table->dateTime('start_time')->nullable()->default(null);
            //The datetime when the match finished.
            $table->dateTime('end_time')->nullable()->default(null);
            //The current/final score of team 1
            $table->integer('team1_score')->default(0);
            //The current/final score of team 2
            $table->integer('team2_score')->default(0);
            $table->string('server_ip')->default('127.0.0.1');

            /**
             * Foreign Key Constraints
             */
            $table->foreign('team1_id')->references('id')->on('teams');
            $table->foreign('team2_id')->references('id')->on('teams');
            $table->foreign('child_match_id')->references('id')->on('matches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
