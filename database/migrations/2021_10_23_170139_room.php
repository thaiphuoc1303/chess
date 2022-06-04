<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Room extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('player1')->unsigned();
            $table->foreign('player1')->references('id')->on('users');
            $table->integer('player2')->default(0);
            $table->tinyInteger('turn')->default(0);
            $table->string('board');
            $table->time('previous_turn')->nullable(true);
            $table->dateTime('start_time')->default(null);
            $table->dateTime('end_time');
            $table->integer('status')->default(0);
            $table->integer('before')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('room');
    }
}
