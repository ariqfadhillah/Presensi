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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
	return redirect('/dashboard');
	// return view('auths.login');
});

// -----------------------
// ---- login disini -----
// -----------------------

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

// -----------------------------------------------------------
// -ini middleware untuk mengecek apakah yg masuk adalah admin
// -----------------------------------------------------------

Route::group(['middleware' => ['auth','checkRole:admin']],function(){
	Route::get('/users','UsersController@index');
	Route::get('getdatauser', [
	'uses'	=> 'UsersController@getBasicData',
	'as' => 'ajax-users',
	]);
	Route::post('/users/create','UsersController@create');
	Route::get('/users/{id}/edit','UsersController@edit');
	Route::get('/users/{id}/delete','UsersController@delete');
	Route::post('/users/{id}/update','UsersController@update');
// -----------------------------------------------------------
// -ini untuk Master User
// -----------------------------------------------------------	
});

// ------------------------------------------------------------------
// -ini middleware untuk mengecek apakah yg masuk adalah admin / user
// ------------------------------------------------------------------

Route::group(['middleware' => ['auth','checkRole:admin,user']],function(){
	Route::post('/users/{id}/update_setting','UsersController@update_setting');
	Route::get('/users/{id}/setting','UsersController@setting');
	Route::post('/users/{id}/update_setting','UsersController@update_setting');
	Route::get('/changePassword','UsersController@showChangePasswordForm');
	Route::post('/changePassword','UsersController@changePassword')->name('changePassword');
	Route::get('/presensi','PresensiController@index');
	Route::get('getdata', [
	'uses'	=> 'PresensiController@getBasicData',
	'as' => 'ajax-presensi',
	]);

// -----------------------------------------------------------
// -ini untuk Master Mesin Presensi
// -----------------------------------------------------------		
	Route::post('/presensi/create','PresensiController@create');
	Route::get('/presensi/{id}/edit','PresensiController@edit');
	Route::post('/presensi/{id}/update','PresensiController@update');
	Route::get('/presensi/{id}/delete','PresensiController@delete');

// -----------------------------------------------------------
// -ini untuk Master Mesin Rekap
// -----------------------------------------------------------		
	Route::get('/rekap','RekapController@index');
	Route::get('/rekap/{id}/detail','RekapController@detail');
	Route::get('/detail','DetailController@index');
	Route::get('/detail/{id}/show','DetailController@details');

// -----------------------------------------------------------
// -ini untuk Dashboard
// -----------------------------------------------------------	
	Route::get('/dashboard','DashboardController@index');
});

