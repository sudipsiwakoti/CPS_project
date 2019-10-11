<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActityTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('activityDesc');
            $table->timestamps();
        });
    

        DB::table('activity_type')->insert([
            ['activityDesc' => 'Lecture'],['activityDesc' => 'Tutorial'],['activityDesc' => 'Seminar'],['activityDesc' => 'Workshop'],['activityDesc' => 'Studio'],
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actity_type');
    }
}
