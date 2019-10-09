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
use App\prerequisite;

class PlanUpdateController extends Controller
{
    //


	public function showPlan() {
		$plan = Plan::where('userID','=',Auth::user()->id)->get();
		if (count($plan) == 0)
			return view('createPlan');
		$subjects = Courserequirement::where('courseID','=',$plan[0]->courseID)->get();
		$subjectsBySem = Subjects::whereIn('subjectID',$subjects->pluck('subjectID'))->get();
		$myEnrolments = DB::table('Subjectenrolment')
		->join('subjects','subjectEnrolment.subjectID','=','subjects.subjectID')
		->whereIn('planID',$plan->pluck('planID'))->select('Subjectenrolment.*','subjects.subjectName','subjects.creditPoints')->distinct()->get();

		$grouped = $myEnrolments->mapToGroups(function ($item, $key) {
    	return [$item->semester => $item->creditPoints];
		});
		$i = 0;
		foreach ($grouped as $group){
			$group->sem = ($grouped->keys())[$i];
			$i = $i + 1;
			if($group->sum() > 21)
				$group->enrollable = 0;
			else
				$group->enrollable = 1;
		}
		$semesters = Subjectenrolment::wherein('planId',$plan->pluck('planID'))->groupBy('semester')->get();
		$subjectsUnique = Subjects::whereIn('subjectID',$subjects->pluck('subjectID'))->whereNotIn('subjectID',$myEnrolments->pluck('subjectID'))->groupBy('subjectID')->get();
		return view('planning', ['details' => $plan, 'currentEnrolments' => $myEnrolments,'subjects' => $subjectsUnique, 'subjectOfferings' => $subjectsBySem, 'semesters' => $semesters, 'semCPs' => $grouped]);
	}

	public function addSubject($plan, $subject, $semester) {
		DB::table('subjectEnrolment')->insert(['planID' => $plan, 'userID' => Auth::user()->id, 'subjectID' => $subject, 'semester' => $semester, 'status' => 'Planned']);
		return redirect()->route('planning');
	}

    public function removeSubject($subjectenrolment) {
    	Subjectenrolment::where('subjectEnrolmentID','=',$subjectenrolment)->delete();
    	return redirect()->route('planning');
    }


    public function createPlan($courseID){
    	DB::table('plan')->insert(['courseID' => $courseID, 'userID' => Auth::user()->id]);
    	return redirect()->route('planning');
    }
}
