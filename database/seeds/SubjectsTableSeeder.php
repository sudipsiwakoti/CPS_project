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
    		['subjectID' => 41091, 'subjectName' => 'Data Systems', 'semester' => 1902],
            ['subjectID' => 41091, 'subjectName' => 'Data Systems', 'semester' => 2002],    
            ['subjectID' => 41091, 'subjectName' => 'Data Systems', 'semester' => 2102],        
            ['subjectID' => 41082, 'subjectName' => 'Introduction to Data Engineering', 'semester' => 1901],
            ['subjectID' => 41082, 'subjectName' => 'Introduction to Data Engineering', 'semester' => 1902],
            ['subjectID' => 41082, 'subjectName' => 'Introduction to Data Engineering', 'semester' => 2001],
            ['subjectID' => 41082, 'subjectName' => 'Introduction to Data Engineering', 'semester' => 2002],
            ['subjectID' => 41082, 'subjectName' => 'Introduction to Data Engineering', 'semester' => 2101],
            ['subjectID' => 41082, 'subjectName' => 'Introduction to Data Engineering', 'semester' => 2102],
            ['subjectID' => 41082, 'subjectName' => 'Introduction to Data Engineering', 'semester' => 2201],
            ['subjectID' => 48210, 'subjectName' => 'Interrogating Technology: Sustainability, Environment and Social Change', 'semester' => 1901],
            ['subjectID' => 48210, 'subjectName' => 'Interrogating Technology: Sustainability, Environment and Social Change', 'semester' => 1902],
            ['subjectID' => 48210, 'subjectName' => 'Interrogating Technology: Sustainability, Environment and Social Change', 'semester' => 2001],
            ['subjectID' => 48210, 'subjectName' => 'Interrogating Technology: Sustainability, Environment and Social Change', 'semester' => 2002],
            ['subjectID' => 48210, 'subjectName' => 'Interrogating Technology: Sustainability, Environment and Social Change', 'semester' => 2101],
            ['subjectID' => 48210, 'subjectName' => 'Interrogating Technology: Sustainability, Environment and Social Change', 'semester' => 2102],

            ['subjectID' => 41029, 'subjectName' => 'Engineering Research Preparation', 'semester' => 1901],
            ['subjectID' => 41029, 'subjectName' => 'Engineering Research Preparation', 'semester' => 1902],
            ['subjectID' => 41029, 'subjectName' => 'Engineering Research Preparation', 'semester' => 2001],
            ['subjectID' => 41029, 'subjectName' => 'Engineering Research Preparation', 'semester' => 2002],
            ['subjectID' => 41029, 'subjectName' => 'Engineering Research Preparation', 'semester' => 2101],
            ['subjectID' => 41029, 'subjectName' => 'Engineering Research Preparation', 'semester' => 2102],

            ['subjectID' => 41030, 'subjectName' => 'Engineering Capstone', 'semester' => 1901],
            ['subjectID' => 41030, 'subjectName' => 'Engineering Capstone', 'semester' => 1902],
            ['subjectID' => 41030, 'subjectName' => 'Engineering Capstone', 'semester' => 2001],
            ['subjectID' => 41030, 'subjectName' => 'Engineering Capstone', 'semester' => 2002],
            ['subjectID' => 41030, 'subjectName' => 'Engineering Capstone', 'semester' => 2101],
            ['subjectID' => 41030, 'subjectName' => 'Engineering Capstone', 'semester' => 2102],

            ['subjectID' => 41083, 'subjectName' => 'Data Engineering Design', 'semester' => 1901],
            ['subjectID' => 48430, 'subjectName' => 'Fundamentals of C Programming', 'semester' => 1901],
            ['subjectID' => 41090, 'subjectName' => 'Information and Signals', 'semester' => 1901],
            ['subjectID' => 31250, 'subjectName' => 'Introduction to Data Analytics', 'semester' => 1901],
            ['subjectID' => 48434, 'subjectName' => 'Embedded Software', 'semester' => 1901],
            ['subjectID' => 48033, 'subjectName' => 'Internet of Things', 'semester' => 1901],
            ['subjectID' => 48450, 'subjectName' => 'Real-time Operating Systems', 'semester' => 1901],
            ['subjectID' => 41092, 'subjectName' => 'Netowrk FUndamentals', 'semester' => 1901],
            ['subjectID' => 41081, 'subjectName' => 'Sensing, Acutation and Control', 'semester' => 1901],
    		['subjectID' => 48250, 'subjectName' => 'Engineering Economics and Finance', 'semester' => 1901],
    		['subjectID' => 41087, 'subjectName' => 'Applications Studio B', 'semester' => 1901],
    		['subjectID' => 31075, 'subjectName' => 'Object-relational Databases', 'semester' => 1901],
    		['subjectID' => 48230, 'subjectName' => 'Engineering Communication', 'semester' => 1901],
    		['subjectID' => 33130, 'subjectName' => 'Mathematical Modelling 1', 'semester' => 1901]
		]);
    }
}
