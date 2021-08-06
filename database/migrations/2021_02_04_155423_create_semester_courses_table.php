<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemesterCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester_courses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('session_id')->unsigned()->index();
            $table->bigInteger('course_id')->unsigned()->index();
            
            $table->string('semester_section');
            $table->integer('group');
            $table->boolean('status');

            $table->foreign('session_id')
               ->references ('id')->on('session_data')
               ->onDelete('cascade');

            
            $table->foreign('course_id')
               ->references ('id')->on('courses')
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
        Schema::dropIfExists('semester_courses');
    }
}
