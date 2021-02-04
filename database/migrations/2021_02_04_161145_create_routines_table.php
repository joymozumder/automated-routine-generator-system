<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('semester_course_id')->unsigned()->index();
            $table->bigInteger('teacher_id')->unsigned()->index();
            $table->integer('total_student');
            $table->integer('room_number');
            $table->double('duration');
            $table->integer('day');
            $table->integer('start');
            $table->integer('end');
            $table->integer('course_type');
            $table->boolean('entry_type')->comment('0=>normal entry, 1=>manual entry');
            $table->boolean('status');

            $table->foreign('semester_course_id')
               ->references ('id')->on('semester_courses')
               ->onDelete('cascade');
            $table->foreign('teacher_id')
               ->references ('id')->on('users')
               ->onDelete('cascade');

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
        Schema::dropIfExists('routines');
    }
}
