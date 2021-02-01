<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemesterSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('semester');
            $table->boolean('status');
            $table->string('session_name');
            $table->foreign('session_name')
               ->references ('session_name')->on('session_data')
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
        Schema::dropIfExists('semester_sections');
    }
}
