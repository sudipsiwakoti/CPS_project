<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include('database/coursedesc.php');
        DB::table('courses')->insert([
    		['courseID' => 'C09067', 'courseName' => 'Bachelor of Engineering (Honours) Diploma in Professional Engineering Practice', 'courseDesc' => $engineeringDesc],
    		['courseID' => 'C10209', 'courseName' => 'Bachelor of Arts in Educational Studies', 'courseDesc' => $artsDesc],
    		['courseID' => 'C09049', 'courseName' => 'Bachelor of Health Science (Honours)', 'courseDesc' => $healthSciDesc],
    		['courseID' => 'C09119', 'courseName' => 'Bachelor of Computing Science (Honours)', 'courseDesc' => $compSciDesc],
    		['courseID' => 'C10278', 'courseName' => 'Bachelor of Information Systems, Bachelor of Business', 'courseDesc' => $infoSystemsDesc],
    		['courseID' => 'C10348', 'courseName' => 'Bachelor of Economics', 'courseDesc' => $ecoDesc]
		]);
       
    }
}
