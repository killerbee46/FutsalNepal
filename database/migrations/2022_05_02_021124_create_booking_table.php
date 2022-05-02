<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booker_id')->unsigned();
            $table->integer('futsal_id')->unsigned();
            $table->integer('time_id')->unsigned();
            $table->boolean('isBooked')->default(0);
            $table->foreign('futsal_id')->references('id')->on('futsal');
            $table->foreign('booker_id')->references('id')->on('users');
            $table->foreign('time_id')->references('id')->on('times');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
}
