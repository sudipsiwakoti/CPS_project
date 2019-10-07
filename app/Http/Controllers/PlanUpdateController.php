<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Plan;
use App\Subjects;
use App\Courses;
use App\Courserequirement;
use App\Subjectenrolment;

class PlanUpdateController extends Controller
{
    //


	public function showPlan() {
		$plan = Plan::where('userID','=',Auth::user()->id)->get();
		$subjects = Courserequirement::where('courseID','=',$plan[0]->courseID)->get();
		$subjectsBySem = Subjects::whereIn('subjectID',$subjects->pluck('subjectID'))->get();
		$myEnrolments = DB::table('Subjectenrolment')
		->join('subjects','subjectEnrolment.subjectID','=','subjects.subjectID')
		->whereIn('planID',$plan->pluck('planID'))->select('Subjectenrolment.*','subjects.subjectName')->distinct()->get();		
		$subjectsUnique = Subjects::whereIn('subjectID',$subjects->pluck('subjectID'))->whereNotIn('subjectID',$myEnrolments->pluck('subjectID'))->groupBy('subjectID')->get();
		return view('planning', ['details' => $plan, 'currentEnrolments' => $myEnrolments,'subjects' => $subjectsUnique, 'subjectOfferings' => $subjectsBySem]);
	}

	public function addSubject($plan, $subject, $semester) {
		DB::table('subjectEnrolment')->insert(['planID' => $plan, 'userID' => Auth::user()->id, 'subjectID' => $subject, 'semester' => $semester, 'status' => 'Planned']);
		return redirect()->route('planning');
	}

    public function editPlan($subjectenrolment) {

    }
}
