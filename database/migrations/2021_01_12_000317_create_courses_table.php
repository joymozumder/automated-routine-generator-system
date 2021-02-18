<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->string('name');
            $table->double('credit');
            $table->integer('type')->comment('0=>Theory_Class, 1=>CSE_Lab, 2=>EEE_Lab, 3=>Communication_Lab, 4=>Mechanical_Lab, 5 => Physics_Lab');
            $table->integer('semester');
            $table->boolean('status');
            //0->normal 1->cse lab 2->eee lab 3->com lab 4->me lab 5-> phy lab
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
        Schema::dropIfExists('courses');
    }
}
