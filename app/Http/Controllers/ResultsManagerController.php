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
        array_shift($inputs);
        foreach ($inputs as $key => $value){
        	Subjectenrolment::where('subjectEnrolmentID',$key)->update(['grade' =>intval($value)]);
        }
        
        return redirect()->route('sResults');
    }

}
