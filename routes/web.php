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

Route::get('/', function () {
    return view('auths.login');
});

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

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
});


Route::group(['middleware' => ['auth','checkRole:admin,user']],function(){
	Route::get('/users/{id}/setting','UsersController@setting');
	Route::post('/users/{id}/update_setting','UsersController@update_setting');
	Route::get('/changePassword','UsersController@showChangePasswordForm');
	Route::post('/changePassword','UsersController@changePassword')->name('changePassword');
	Route::get('/presensi','PresensiController@index');
	Route::get('getdata', [
	'uses'	=> 'PresensiController@getBasicData',
	'as' => 'ajax-presensi',
	]);
	Route::post('/presensi/create','PresensiController@create');
	Route::get('/presensi/{id}/edit','PresensiController@edit');
	Route::post('/presensi/{id}/update','PresensiController@update');
	Route::get('/presensi/{id}/delete','PresensiController@delete');
	Route::get('/rekap','RekapController@index');
	Route::get('/rekap/{id}/detail','RekapController@detail');
	Route::get('/detail','DetailController@index');
	Route::get('/detail/{id}/detail', [
	'uses'	=> 'DetailController@details',
	'as' => 'ajaxDetail',
	]);
	Route::get('/dashboard','DashboardController@index');
});

