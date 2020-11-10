<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //The player's UNIQUE in-game username.
            $table->string('username')->unique();
            //The users full name.
            $table->string('full_name');
            //The country the player is originally from (or is now representing).
            $table->string('country');
            //The players official Twitter handle.
            $table->string('twitter');
            //The players Discord username.
            $table->string('discord');
            //The unique ID of the team the player represents.
            $table->unsignedBigInteger('team_id');
            //The number of wins the player has.
            $table->integer('wins');
            //The number of losses the player has
            $table->integer('losses');
            //The number of draws the player has.
            $table->integer('draws');
            //Numercal rating based off previous performances.
            $table->float('rating');
            //User ID - allowing players to be linked to a specific user in the system.
            $table->unsignedBigInteger('user_id');

            /**
             * Foreign Key Contraints
             */
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
