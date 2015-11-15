<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//Home Page with Items
Route::get('/', function () {

	if(Auth::check()){
		$user = Auth::user();
		$userId = $user->id;
		$items = DB::table('items')->get();

		$userlist = DB::table('users')->orderBy('points', 'desc')->get();
		return view('home', ['items' => $items, 'user' => $user, 'userlist' => $userlist]);
	}

	return view('welcome');
});

//Create
Route::get('/create', function () {
	if(Auth::check()){
		$user = Auth::user();
    	return view('create', ['user' => $user]);
	}
	return view('welcome');

});

Route::post('/create', 'HomeController@createItem');

//Edit
Route::post('/', 'HomeController@toggleItems')->before('crsf');

//Delete
Route::get('/delete', 'HomeController@deleteDone');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
