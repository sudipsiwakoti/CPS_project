<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('courseID');
            $table->string('courseName');
            $table->string('courseDesc');
            $table->string('courseLength');
            $table->integer('courseCoor');
            $table->integer('coursePrice');
            $table->integer('creditPts');
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                'courseName' => 'Bachelor of Engineering (Data Engineering)',
                'courseLength' => 'Five years',
                'creditPts' => 192)
        );
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
