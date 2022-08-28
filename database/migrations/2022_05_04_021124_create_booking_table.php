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
            $table->string('book_date');
            $table->string('book_time');
            $table->integer('penalty')->default(0);
            $table->boolean('isBooked')->default(0);
            $table->enum('medium',['system',"call"])->default('system');
            $table->boolean('paid')->default(0);
            $table->string('remarks');
            $table->foreign('futsal_id')->references('id')->on('futsal');
            $table->foreign('booker_id')->references('id')->on('users');
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
