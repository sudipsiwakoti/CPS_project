<?php

namespace App\Http\Controllers;

use DB;
use App\Subjects;
use App\Courses;


class DynamicViewController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Dynamic View Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for dynamically setting views for subjects
    | and courses pages.
    |
    */

	function showSubject($subjectID){
    	$data = DB::table('subjects')->where('subjectID', '=', $subjectID)->first();
    	return view('subjectinfo', ['subjectID'=>$subjectID])->withDetails($data);
	}

	function showCourse($courseID){
    	$data = DB::table('courses')->where('courseID', '=', $courseID)->first();
    	return view('courseinfo', ['courseID'=>$courseID])->withDetails($data);
	}
    
}
