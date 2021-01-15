<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('session_name');
            $table->string('semester');
            $table->string('teacher_code');
            $table->string('course_code');
            $table->string('room_number');
            $table->integer('group');
            $table->double('duration');
            $table->integer('start');
            $table->integer('end');

            $table->foreign('session_name')
               ->references ('session_name')->on('session_data')
               ->onDelete('cascade');

            $table->foreign('semester')
               ->references ('semester')->on('semester_sections')
               ->onDelete('cascade');

            $table->foreign('teacher_code')
               ->references ('code')->on('users')
               ->onDelete('cascade');

            $table->foreign('course_code')
               ->references ('code')->on('courses')
               ->onDelete('cascade');

            $table->foreign('room_number')
               ->references ('number')->on('rooms')
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
        Schema::dropIfExists('enrollments');
    }
}
