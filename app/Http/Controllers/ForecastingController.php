<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Plan;
use App\Subjects;
use App\Subjectenrolment;

class ForecastingController extends Controller
{
    public function index() {
    	$mySubjects = DB::table('Subjects')->leftJoin('Subjectenrolment', function($join)
    	{
    		$join->on('Subjects.subjectID','=','Subjectenrolment.subjectID');
    		$join->on('Subjects.semester','=','Subjectenrolment.semester');
    	})->where('Subjects.coordinator','=',Auth::user()->id)->groupBy('Subjects.subjectID','Subjects.semester')->select(DB::raw('Subjects.*, count(Subjectenrolment.subjectEnrolmentID) as nbEnrolments'))->get();
    	return view('enrolments',['subjects' => $mySubjects]);
    }

    public function accessManagement() {
    	$allSubjects = DB::table('Subjects')->leftJoin('Users','Subjects.coordinator','=','Users.id')->select('Subjects.*','Users.name')->get();
    	return view('uam',['subjects' => $allSubjects]);
    }

    public function assignCoordinator($subject, $semester) {
        	DB::table('Subjects')->where([['subjectID','=',$subject],['semester','=',$semester]])->update(['coordinator' => Auth::user()->id]);
    	return redirect()->route('access');
    }

    public function removeCoordinator($subject, $semester) {
        	DB::table('Subjects')->where([['subjectID','=',$subject],['semester','=',$semester]])->update(['coordinator' => NULL]);
    	return redirect()->route('access');


    }
}
