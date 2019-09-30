<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('subjectID');
            $table->string('subjectName');
            $table->string('subjectDesc');
            $table->integer('subjectPreReq');
            $table->integer('subjectAntiReq');
            $table->integer('semester');
            $table->boolean('active');
            $table->boolean('school');
            $table->boolean('coordinator');
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
        Schema::dropIfExists('subjects');
    }
}
