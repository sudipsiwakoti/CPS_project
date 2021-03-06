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

use App\Http\Controllers\ExportPlanController;
use App\User;
use App\Plan;
use App\Subjects;
use App\Courses;
use App\Courserequirement;
use App\Prerequisites;

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
    else return view ('subjects')->withMessage('No details found. Try to search again !');
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
    else return view ('courses')->withMessage('No details found. Try to search again !');
});

/************************************ ROUTE FOR SUBJECT PAGES ************************************************/
Route::get('subject/{subjectID}', 'DynamicViewController@showSubject');

/************************************ ROUTE FOR COURSE PAGES ************************************************/
Route::get('course/{courseID}', 'DynamicViewController@showCourse');

/************************************ ROUTE FOR PLANNING ****************************************************/
Route::get('/planning', 'PlanUpdateController@showPlan')->name('planning');
Route::get('/planning/{planID}/{subjectID}/{semester}', 'PlanUpdateController@addSubject')->name('pAdd');
Route::get('/planning/remove/{enrolment}', 'PlanUpdateController@removeSubject')->name('pRemove');
Route::get('/planning/create/{courseID}', 'PlanUpdateController@createPlan')->name('pCreate');
Route::any('/planning/create',function(){
    	$q = Request::get ( 'q' );
    	$user = Courses::where('courseID','LIKE','%'.$q.'%')->orWhere('courseName','LIKE','%'.$q.'%')->get();
    	$user = $user->unique('courseID');
    	if(count($user) > 0)
      		return view('createPlan')->withDetails($user)->withQuery ( $q );
    	else return view ('createPlan')->withMessage('No Details found. Try to search again !');
    });

/************************************ ROUTE FOR RESULTS ****************************************************/
Route::get('/results', 'ResultsManagerController@showResults')->name('sResults');
Route::get('/results/edit', 'ResultsManagerController@editResults')->name('eResults');
Route::any('/results/post', 'ResultsManagerController@postResults')->name('pResults');


Route::get('/dynamic_pdf', 'DynamicPDFController@index');

Route::get('/dynamic_pdf/pdf', 'DynamicPDFController@pdf');

//Route::get('/dynamic_pdf/pdf', function()
//{
  //  return redirect('/dynamic_pdf')->route('planning');
//});

/************************************ ROUTE FOR FORECASTING************************************************/
Route::get('/enrolments','ForecastingController@index');
Route::get('/enrolments/uam','ForecastingController@accessManagement')->name("access");
Route::get('/enrolments/uam/assign/{subject}/{semester}','ForecastingController@assignCoordinator')->name("assign");
Route::get('/enrolments/uam/remove/{subject}/{semester}','ForecastingController@removeCoordinator')->name("removeC");