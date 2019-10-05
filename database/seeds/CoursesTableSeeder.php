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
        DB::table('courses')->insert([
    		['courseID' => 'C09067', 'courseName' => 'Bachelor of Engineering (Honours) Diploma in Professional Engineering Practice'],
    		['courseID' => 'C10209', 'courseName' => 'Bachelor of Arts in Educational Studies'],
    		['courseID' => 'C09049', 'courseName' => 'Bachelor of Health Science (Honours)'],
    		['courseID' => 'C09119', 'courseName' => 'Bachelor of Computing Science (Honours)'],
    		['courseID' => 'C10278', 'courseName' => 'Bachelor of Information Systems, Bachelor of Business'],
    		['courseID' => 'C10348', 'courseName' => 'Bachelor of Economics']
		]);
    }
}
