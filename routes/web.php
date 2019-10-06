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
use App\Courserequirement;

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
    $user = $user->unique('subjectID');
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
    $user = $user->unique('courseID');
    if(count($user) > 0)
      	return view('courses')->withDetails($user)->withQuery ( $q );
    else return view ('courses')->withMessage('No Details found. Try to search again !');
});

/************************************ ROUTE FOR SUBJECT PAGES ************************************************/
Route::get('subject/{subjectID}', 'DynamicViewController@showSubject');

/************************************ ROUTE FOR COURSE PAGES ************************************************/
Route::get('course/{courseID}', 'DynamicViewController@showCourse');

/************************************ ROUTE FOR PLANNING ****************************************************/
Route::get('/planning', 'PlanUpdateController@showPlan');
Route::post('/planning/{subject}/{semester}', 'PlanUpdateController@addSubject');

