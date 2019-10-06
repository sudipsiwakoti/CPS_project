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
    		['subjectID' => 41091, 'subjectName' => 'Data Systems', 'subjectCreditPoints' => 6],
    		['subjectID' => 48250, 'subjectName' => 'Engineering Economics and Finance', 'subjectCreditPoints' => 6],
    		['subjectID' => 41087, 'subjectName' => 'Applications Studio B', 'subjectCreditPoints' => 6],
    		['subjectID' => 31075, 'subjectName' => 'Object-relational Databases', 'subjectCreditPoints' => 6],
    		['subjectID' => 48230, 'subjectName' => 'Engineering Communication', 'subjectCreditPoints' => 6],
    		['subjectID' => 33130, 'subjectName' => 'Mathematical Modelling 1', 'subjectCreditPoints' => 6]
		]);
    }
}
