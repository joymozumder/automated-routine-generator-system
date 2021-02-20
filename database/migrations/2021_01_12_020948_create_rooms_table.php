<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number')->unique();
            $table->string('name');
            $table->integer('type')->comment('0=>Theory_Class, 1=>CSE_Lab, 2=>EEE_Lab, 3=>Communication_Lab, 4=>Mechanical_Lab, 5 => Physics_Lab');
            $table->integer('capacity');
            $table->string('free_time');
            $table->boolean('status');
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
        Schema::dropIfExists('rooms');
    }
}
