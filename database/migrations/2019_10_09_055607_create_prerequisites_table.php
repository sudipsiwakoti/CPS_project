<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrerequisitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prerequisites', function (Blueprint $table) {
            $table->integer('subjectID');
            $table->integer('prerequisiteID');
            $table->timestamps();
        });

        DB::table('prerequisites')->insert([
            ['subjectID' => 41091, 'prerequisiteID' => 41087],
            ['subjectID' => 48250, 'prerequisiteID' => 48230],
            ['subjectID' => 48434, 'prerequisiteID' => 48430],
            ['subjectID' => 48450, 'prerequisiteID' => 48434],
            ['subjectID' => 48450, 'prerequisiteID' => 41090]
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prerequisites');
    }
}
