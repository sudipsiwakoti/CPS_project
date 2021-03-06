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
            $table->integer('subjectID');
            $table->string('subjectName');  
            $table->string('subjectDesc')->nullable();
            $table->integer('semester')->nullable();
            $table->integer('creditPoints');
            $table->boolean('active')->nullable();
            $table->boolean('school')->nullable();
            $table->integer('coordinator')->nullable();
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
