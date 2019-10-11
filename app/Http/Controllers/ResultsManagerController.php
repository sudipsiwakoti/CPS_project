<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subjectenrolment;
use App\Plan;
use DB;
use Auth;

class ResultsManagerController extends Controller
{
    public function showResults(){
    	$plan = Plan::where('userID','=',Auth::user()->id)->get();
		$myEnrolments = DB::table('Subjectenrolment')
		->join('subjects','subjectEnrolment.subjectID','=','subjects.subjectID')
		->whereIn('planID',$plan->pluck('planID'))->select('Subjectenrolment.*','subjects.subjectName','subjects.creditPoints')->distinct()->get();
    	$semesters = Subjectenrolment::wherein('planId',$plan->pluck('planID'))->groupBy('semester')->get();

    	$GPA = DB::table('Subjectenrolment')->join('subjects','subjectEnrolment.subjectID','=','subjects.subjectID')->wherein('planID',$plan->pluck('planID'))->select('Subjectenrolment.subjectEnrolmentID','subjects.creditPoints','Subjectenrolment.grade','Subjectenrolment.status')->distinct()->get();
    	/*
    	for each subjectenrolment
    	if status != planned
		switch grade
		case >= 85 : 4
		case >= 75 : 3.5
		case >= 65 : 2.5
		case >= 50 = 1.5
		else 0
    	*/

    	return view('results',['planID' => $plan, 'subjects' => $myEnrolments, 'semesters' => $semesters]);
    }

    public function editResults(){
        	$plan = Plan::where('userID','=',Auth::user()->id)->get();
		$myEnrolments = DB::table('Subjectenrolment')
		->join('subjects','subjectEnrolment.subjectID','=','subjects.subjectID')
		->whereIn('planID',$plan->pluck('planID'))->select('Subjectenrolment.*','subjects.subjectName','subjects.creditPoints')->distinct()->get();
    	$semesters = Subjectenrolment::wherein('planId',$plan->pluck('planID'))->groupBy('semester')->get();
    	return view('editResults',['planID' => $plan, 'subjects' => $myEnrolments, 'semesters' => $semesters]);
    }

        public function postResults(Request $request){
        $inputs = $request->all();
	    // rewinds array's internal pointer to the first element
		// and returns the value of the first array element. 
		$value = reset( $inputs );
		// returns the index element of the current array position
		$key   = key( $inputs );
		unset( $inputs[ $key ]);
        foreach ($inputs as $key => $value){
        	Subjectenrolment::where('subjectEnrolmentID',$key)->update(['grade' =>intval($value)]);
        	if (intval($value) >= 50) {
        		Subjectenrolment::where('subjectEnrolmentID',$key)->update(['status' => 'Passed']);
        	}
        	else {
        		Subjectenrolment::where('subjectEnrolmentID',$key)->update(['status' => 'Failed']);
        	}
        }      
        return redirect()->route('sResults');
    }

}
