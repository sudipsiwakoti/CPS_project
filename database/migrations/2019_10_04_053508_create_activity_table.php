<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity', function (Blueprint $table) {
            $table->bigIncrements('activityID');
            $table->integer('subjectID');
            $table->integer('semester');
			$table->string('activityType');
			$table->datetime('startTime');
			$table->float('durationHours');
			$table->integer('repetitions');
			$table->integer('placesAvailable');
            $table->timestamps();
        });

        DB::table('activity')->insert([
            ['subjectID' => 41087,'semester' => 1901, 'activityType' => 'Studio', 'startTime' => '2019-03-27 16:00:00', 'durationHours' => 3, 'repetitions' => 12, 'placesAvailable' => 25],
            ['subjectID' => 41082,'semester' => 1901, 'activityType' => 'Studio', 'startTime' => '2019-03-29 12:00:00', 'durationHours' => 3, 'repetitions' => 12, 'placesAvailable' => 25],
            ['subjectID' => 48210,'semester' => 1901, 'activityType' => 'Studio', 'startTime' => '2019-03-29 09:00:00', 'durationHours' => 8, 'repetitions' => 12, 'placesAvailable' => 12],
            ['subjectID' => 48210,'semester' => 1902, 'activityType' => 'Studio', 'startTime' => '2019-08-12 09:00:00', 'durationHours' => 8, 'repetitions' => 12, 'placesAvailable' => 15],
            ['subjectID' => 48430,'semester' => 1901, 'activityType' => 'Lecture', 'startTime' => '2019-03-29 15:00:00', 'durationHours' => 2, 'repetitions' => 12, 'placesAvailable' => 50]

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity');
    }
}
