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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/subjects', function() {
	return view('subjects');
});

Route::any('/search',function(){
    $q = Request::get ( 'q' );
    $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
    if(count($user) > 0)
        return view('subjects')->withDetails($user)->withQuery ( $q );
    else return view ('subjects')->withMessage('No Details found. Try to search again !');
});
