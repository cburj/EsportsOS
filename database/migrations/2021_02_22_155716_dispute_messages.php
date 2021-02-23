<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DisputeMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispute_messages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('content');
            $table->boolean('visible')->default(true);
            $table->unsignedBigInteger('matchup_id');
            $table->unsignedBigInteger('user_id');

            //Foreign keys
            $table->foreign('matchup_id')->references('id')->on('matchups');
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
        Schema::dropIfExists('dispute_messages');
    }
}
