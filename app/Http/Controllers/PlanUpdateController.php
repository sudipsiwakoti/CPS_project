<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Plan;
use App\Subjects;
use App\Courses;
use App\Subjectenrolments;

class PlanUpdateController extends Controller
{
    //
	public function addSubject($subject, $plan) {
		DB::table('subjectEnrolment')->insert(['planID' => $plan, 'userID' => Auth::user()->id, 'subjectID' => $subject->subjectID, 'semester' => $subject->semester]);
	}

    public function editPlan($subjectenrolment) {

    }
}
