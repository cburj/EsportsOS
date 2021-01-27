<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Matchups extends Migration
{
/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchups', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //Points to one of the teams.
            $table->unsignedBigInteger('team1_id');
            //Points to one of the teams.
            $table->unsignedBigInteger('team2_id');
            // One of the matches that feeds winners into the current match.
            $table->unsignedBigInteger('child1_id')->nullable();
            // One of the other matches that feeds winners into the current match.
            $table->unsignedBigInteger('child2_id')->nullable();
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

            //Matchup Status
            $table->string('state')->default('AWAITING');

            /**
             * Foreign Key Constraints
             */
            $table->foreign('team1_id')->references('id')->on('teams');
            $table->foreign('team2_id')->references('id')->on('teams');
            $table->foreign('child1_id')->references('id')->on('matchups');
            $table->foreign('child2_id')->references('id')->on('matchups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matchups');
    }
}
