<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationalTable extends Migration
{
    public function up()
    {
        Schema::create('relational', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movieId');//foreign key
            $table->integer('cinemaId');//foreign key

            $table->integer('sessionId');//foreign key
            $table->dateTime('time');
            $table->text('cinema');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
