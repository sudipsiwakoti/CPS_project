<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourserequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courserequirements', function (Blueprint $table) {
            $table->bigIncrements('requirementID');
            $table->string('courseID');
            $table->integer('subjectID');
            $table->timestamps();
        });

        DB::table('courserequirements')->insert([
            ['courseID' => 'C09067', 'subjectID' => 41091],
            ['courseID' => 'C09067', 'subjectID' => 41082],
            ['courseID' => 'C09067', 'subjectID' => 48210],
            ['courseID' => 'C09067', 'subjectID' => 41029],
            ['courseID' => 'C09067', 'subjectID' => 41030],
            ['courseID' => 'C09067', 'subjectID' => 41083],
            ['courseID' => 'C09067', 'subjectID' => 48430],
            ['courseID' => 'C09067', 'subjectID' => 41090],
            ['courseID' => 'C09067', 'subjectID' => 31250],
            ['courseID' => 'C09067', 'subjectID' => 48434],
            ['courseID' => 'C09067', 'subjectID' => 48033],
            ['courseID' => 'C09067', 'subjectID' => 48450],
            ['courseID' => 'C09067', 'subjectID' => 41092],
            ['courseID' => 'C09067', 'subjectID' => 41081],
            ['courseID' => 'C09067', 'subjectID' => 48250],
            ['courseID' => 'C09067', 'subjectID' => 41087],
            ['courseID' => 'C09067', 'subjectID' => 48230],

            ['courseID' => 'C09067', 'subjectID' => 33130],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courserequirements');
    }
}
