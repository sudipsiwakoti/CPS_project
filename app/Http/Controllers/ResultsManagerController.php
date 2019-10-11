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

    	$subjects = DB::table('Subjectenrolment')->join('subjects','subjectEnrolment.subjectID','=','subjects.subjectID')->wherein('planID',$plan->pluck('planID'))->select('Subjectenrolment.subjectEnrolmentID','subjects.creditPoints','Subjectenrolment.grade','Subjectenrolment.status')->distinct()->get();
    	$totalGP = 0;
    	$totalCP = 0;
    	foreach ($subjects as $subject) {
    		if ($subject->status != 'Planned') {
    			$totalCP += $subject->creditPoints;
    			if ($subject->grade >= 85) {
    				$totalGP += 4 * $subject->creditPoints;
    			}
    			elseif ($subject->grade >= 75) {
    				$totalGP += 3.5 * $subject->creditPoints;
    			}
    			elseif($subject->grade >= 65) {
    				$totalGP += 2.5 * $subject->creditPoints;
    			}
    			elseif ($subject->grade >= 50) {
    				$totalGP += 1.5 * $subject->creditPoints;
    			}
    			else {
    				continue;
    			}
    		}

    	}
    	if($totalCP >0)
    		$GPA = $totalGP / $totalCP;
    	else
    		$GPA = '-';


    	return view('results',['planID' => $plan, 'subjects' => $myEnrolments, 'semesters' => $semesters, 'GPA' => $GPA]);
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
