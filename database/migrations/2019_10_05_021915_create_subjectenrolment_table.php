<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectenrolmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjectEnrolment', function (Blueprint $table) {
            $table->bigIncrements('subjectEnrolmentID');
            $table->bigInteger('userID');
            $table->integer('subjectID');
            $table->integer('status');
            $table->integer('grade');
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
        Schema::dropIfExists('subjectenrolment');
    }
}
