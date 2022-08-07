<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFutsalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('futsal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id');
            $table->string('name');
            $table->string('image');
            $table->string('date');
            $table->string('contact');
            $table->string('email');
            $table->string('city');
            $table->string('area');
            $table->string('map');
            $table->integer('price');
            $table->foreign('owner_id')->references('id')->on('users');
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
        Schema::dropIfExists('futsal');
    }
}
