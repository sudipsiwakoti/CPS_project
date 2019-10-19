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

// Update plan controller
class PlanUpdateController extends Controller
{
    //


	public function showPlan(Request $request){

		if (Auth::check()) {
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

		$completedSubjects = $myEnrolments->where('status','!=','Failed');

		$subjectsUnique = Subjects::whereIn('subjectID',$subjects->pluck('subjectID'))->whereNotIn('subjectID',$completedSubjects->pluck('subjectID'))->groupBy('subjectID')->get();
		$missingPR = $request->all();
		if (count($missingPR) > 0)
		{
			return view('planning', ['details' => $plan, 'currentEnrolments' => $myEnrolments,'subjects' => $subjectsUnique, 'subjectOfferings' => $subjectsBySem, 'semesters' => $semesters, 'semCPs' => $grouped, 'warning' => $missingPR]);
		}
		return view('planning', ['details' => $plan, 'currentEnrolments' => $myEnrolments,'subjects' => $subjectsUnique, 'subjectOfferings' => $subjectsBySem, 'semesters' => $semesters, 'semCPs' => $grouped]);
		}
		else
			return redirect()->route('register');
	}

	public function addSubject($plan, $subject, $semester) {

		$prerequisites = DB::table('prerequisites')->where('subjectID','=',$subject)->select('prerequisiteID')->get();
		$missedPR = [];
		$prereqWarning = 0;
		foreach ($prerequisites as $prerequisite)
		{
			if (DB::table('Subjectenrolment')->where([['subjectID','=',$prerequisite->prerequisiteID],['planID','=',$plan],['semester','<',$semester]])->count() == 0)
			{
				array_push($missedPR,$prerequisite->prerequisiteID);
				$prereqWarning = 1;
			}
		}
		if ($prereqWarning == 1)
			return redirect()->route('planning', ['warning' => $missedPR]);
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
