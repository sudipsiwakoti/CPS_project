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
        include('database/subjectdesc.php');

        DB::table('subjects')->insert([
    		['subjectID' => 41091, 'subjectName' => 'Data Systems', 'subjectDesc' => $dataSystemsDesc, 'semester' => 1902, 'creditPoints' => 6, 'coordinator' => 2],
            ['subjectID' => 41091, 'subjectName' => 'Data Systems', 'subjectDesc' => $dataSystemsDesc, 'semester' => 2002, 'creditPoints' => 6, 'coordinator' => 2],    
            ['subjectID' => 41091, 'subjectName' => 'Data Systems', 'subjectDesc' => $dataSystemsDesc, 'semester' => 2102, 'creditPoints' => 6, 'coordinator' => 2]
            ,        
            ['subjectID' => 41082, 'subjectName' => 'Introduction to Data Engineering', 'subjectDesc' => $introDataEngDesc, 'semester' => 1901, 'creditPoints' => 6, 'coordinator' => 2],
            ['subjectID' => 41082, 'subjectName' => 'Introduction to Data Engineering', 'subjectDesc' => $introDataEngDesc, 'semester' => 1902, 'creditPoints' => 6, 'coordinator' => 2],
            ['subjectID' => 41082, 'subjectName' => 'Introduction to Data Engineering', 'subjectDesc' => $introDataEngDesc, 'semester' => 2001, 'creditPoints' => 6, 'coordinator' => 2],
            ['subjectID' => 41082, 'subjectName' => 'Introduction to Data Engineering', 'subjectDesc' => $introDataEngDesc, 'semester' => 2002, 'creditPoints' => 6, 'coordinator' => 2],
            ['subjectID' => 41082, 'subjectName' => 'Introduction to Data Engineering', 'subjectDesc' => $introDataEngDesc, 'semester' => 2101, 'creditPoints' => 6, 'coordinator' => 2],
            ['subjectID' => 41082, 'subjectName' => 'Introduction to Data Engineering', 'subjectDesc' => $introDataEngDesc, 'semester' => 2102, 'creditPoints' => 6, 'coordinator' => 2],
            ['subjectID' => 41082, 'subjectName' => 'Introduction to Data Engineering', 'subjectDesc' => $introDataEngDesc, 'semester' => 2201, 'creditPoints' => 6, 'coordinator' => 2]
            ,
            ['subjectID' => 48210, 'subjectName' => 'Interrogating Technology: Sustainability, Environment and Social Change', 'subjectDesc' => $itsescDesc, 'semester' => 1901, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 48210, 'subjectName' => 'Interrogating Technology: Sustainability, Environment and Social Change', 'subjectDesc' => $itsescDesc, 'semester' => 1902, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 48210, 'subjectName' => 'Interrogating Technology: Sustainability, Environment and Social Change', 'subjectDesc' => $itsescDesc, 'semester' => 2001, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 48210, 'subjectName' => 'Interrogating Technology: Sustainability, Environment and Social Change', 'subjectDesc' => $itsescDesc, 'semester' => 2002, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 48210, 'subjectName' => 'Interrogating Technology: Sustainability, Environment and Social Change', 'subjectDesc' => $itsescDesc, 'semester' => 2101, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 48210, 'subjectName' => 'Interrogating Technology: Sustainability, Environment and Social Change', 'subjectDesc' => $itsescDesc, 'semester' => 2102, 'creditPoints' => 6, 'coordinator' => 0],

            ['subjectID' => 41029, 'subjectName' => 'Engineering Research Preparation', 'subjectDesc' => $erpDesc, 'semester' => 1901, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 41029, 'subjectName' => 'Engineering Research Preparation', 'subjectDesc' => $erpDesc, 'semester' => 1902, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 41029, 'subjectName' => 'Engineering Research Preparation', 'subjectDesc' => $erpDesc, 'semester' => 2001, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 41029, 'subjectName' => 'Engineering Research Preparation', 'subjectDesc' => $erpDesc, 'semester' => 2002, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 41029, 'subjectName' => 'Engineering Research Preparation', 'subjectDesc' => $erpDesc, 'semester' => 2101, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 41029, 'subjectName' => 'Engineering Research Preparation', 'subjectDesc' => $erpDesc, 'semester' => 2102, 'creditPoints' => 6, 'coordinator' => 0],

            ['subjectID' => 41030, 'subjectName' => 'Engineering Capstone', 'subjectDesc' => $engCapDesc, 'semester' => 1901, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 41030, 'subjectName' => 'Engineering Capstone', 'subjectDesc' => $engCapDesc, 'semester' => 1902, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 41030, 'subjectName' => 'Engineering Capstone', 'subjectDesc' => $engCapDesc, 'semester' => 2001, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 41030, 'subjectName' => 'Engineering Capstone', 'subjectDesc' => $engCapDesc, 'semester' => 2002, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 41030, 'subjectName' => 'Engineering Capstone', 'subjectDesc' => $engCapDesc, 'semester' => 2101, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 41030, 'subjectName' => 'Engineering Capstone', 'subjectDesc' => $engCapDesc, 'semester' => 2102, 'creditPoints' => 6, 'coordinator' => 0],

            ['subjectID' => 41083, 'subjectName' => 'Data Engineering Design', 'subjectDesc' => $dataEngDesignDesc, 'semester' => 1901, 'creditPoints' => 6, 'coordinator' => 2],
            ['subjectID' => 48430, 'subjectName' => 'Fundamentals of C Programming', 'subjectDesc' => $cProgDesc, 'semester' => 1901, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 41090, 'subjectName' => 'Information and Signals', 'subjectDesc' => $infoSigDesc, 'semester' => 1901, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 31250, 'subjectName' => 'Introduction to Data Analytics', 'subjectDesc' => $introDataAnalyDesc, 'semester' => 1901, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 48434, 'subjectName' => 'Embedded Software', 'subjectDesc' => $embSoftDesc, 'semester' => 1901, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 48033, 'subjectName' => 'Internet of Things', 'subjectDesc' => $iotDesc, 'semester' => 1901, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 48450, 'subjectName' => 'Real-time Operating Systems', 'subjectDesc' => $realtimeOSDesc, 'semester' => 1901, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 41092, 'subjectName' => 'Network Fundamentals', 'subjectDesc' => $netFunDesc, 'semester' => 1901, 'creditPoints' => 6, 'coordinator' => 0],
            ['subjectID' => 41081, 'subjectName' => 'Sensing, Acutation and Control', 'subjectDesc' => $sacDesc, 'semester' => 1901, 'creditPoints' => 6, 'coordinator' => 0],
    		['subjectID' => 48250, 'subjectName' => 'Engineering Economics and Finance', 'subjectDesc' => $eefDesc, 'semester' => 1901, 'creditPoints' => 6, 'coordinator' => 0],
    		['subjectID' => 41087, 'subjectName' => 'Applications Studio B', 'subjectDesc' => $appStudioBDesc, 'semester' => 1901, 'creditPoints' => 6, 'coordinator' => 2],
    		['subjectID' => 48230, 'subjectName' => 'Engineering Communication', 'subjectDesc' => $engComDesc, 'semester' => 1901, 'creditPoints' => 6, 'coordinator' => 0],
    		['subjectID' => 33130, 'subjectName' => 'Mathematical Modelling 1', 'subjectDesc' => $engCapDesc, 'semester' => 1901, 'creditPoints' => 6, 'coordinator' => 0]
		]);
    }
}
