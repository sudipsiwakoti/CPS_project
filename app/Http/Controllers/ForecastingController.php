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

    }
}
