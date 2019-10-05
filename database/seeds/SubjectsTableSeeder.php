<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
    		['subjectID' => 41091, 'subjectName' => 'Data Systems'],
    		['subjectID' => 48250, 'subjectName' => 'Engineering Economics and Finance'],
    		['subjectID' => 41087, 'subjectName' => 'Applications Studio B'],
    		['subjectID' => 31075, 'subjectName' => 'Object-relational Databases'],
    		['subjectID' => 48230, 'subjectName' => 'Engineering Communication'],
    		['subjectID' => 33130, 'subjectName' => 'Mathematical Modelling 1']
		]);
    }
}
