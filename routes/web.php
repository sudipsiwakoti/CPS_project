<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\User;
use App\Plan;
use App\Subjects;
use App\Courses;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/************************************ SEARCH ROUTES **********************************************************/
Route::get('/subjects', function() {
	return view('subjects');
});

Route::any('/searchSubjects',function(){
    $q = Request::get ( 'q' );
    $user = Subjects::where('subjectID','LIKE','%'.$q.'%')->orWhere('subjectName','LIKE','%'.$q.'%')->get();
    if(count($user) > 0)
        return view('subjects')->withDetails($user)->withQuery ( $q );
    else return view ('subjects')->withMessage('No Details found. Try to search again !');
});

Route::get('/courses', function() {
	return view('courses');
});

Route::any('/searchCourses',function(){
    $q = Request::get ( 'q' );
    $user = Courses::where('courseID','LIKE','%'.$q.'%')->orWhere('courseName','LIKE','%'.$q.'%')->get();
    if(count($user) > 0)
      	return view('courses')->withDetails($user)->withQuery ( $q );
    else return view ('courses')->withMessage('No Details found. Try to search again !');
});

Route::get('/planning', function() {
	$plan = Plan::where('userID','=',Auth::user()->id)->get();
	return view('planning')->withDetails($plan);
});

Route::get('/planning/{plan}', 'showPlan@PlanUpdateController');
Route::post('/planning/{subject}/{semester}', 'addSubject@PlanUpdateController');

/************************************ ROUTES FOR SUBJECT PAGES ************************************************/
Route::get('/41091', function() {
	return view('subjectviews.data_systems');
});

Route::get('/48250', function() {
	return view('subjectviews.eng_eco_fin');
});

Route::get('/41087', function() {
	return view('subjectviews.app_studiob');
});

Route::get('/31075', function() {
	return view('subjectviews.ord');
});

Route::get('/48230', function() {
	return view('subjectviews.eng_com');
});

Route::get('/33130', function() {
	return view('subjectviews.math_mod1');
});

/************************************ ROUTES FOR COURSE PAGES ************************************************/
Route::get('/C09067', function() {
	return view('courseviews.eng_hon');
});

Route::get('/C10209', function() {
	return view('courseviews.arts_edu');
});

Route::get('/C09049', function() {
	return view('courseviews.health_science');
});

Route::get('/C09119', function() {
	return view('courseviews.comp_sci');
});

Route::get('/C10278', function() {
	return view('courseviews.info_systems');
});

Route::get('/C10348', function() {
	return view('courseviews.eco');
});

