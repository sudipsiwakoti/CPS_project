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
use App\Subjectenrolments;

class PlanUpdateController extends Controller
{
    //
	public function addSubject($subject, $plan) {
		DB::table('subjectEnrolment')->insert(['planID' => $plan, 'userID' => Auth::user()->id, 'subjectID' => $subject->subjectID, 'semester' => $subject->semester]);
	}

	public function showPlan() {
		$plan = Plan::where('userID','=',Auth::user()->id)->get();
		$subjects = Courserequirement::where('courseID','=',$plan[0]->courseID)->get();
	return view('planning', ['details' => $plan, 'subjects' => $subjects]);
	}

    public function editPlan($subjectenrolment) {

    }
}
