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
    return view('welcome');
});
Route::resource('photos', 'PhotoController');

//Route::resource('admin/users', 'Admin\UsersController');



Route::prefix('admin')->middleware('auth')->group(function () {
	Route::get('demoone', 'DemoController@index');
	Route::resource('users', 'Admin\UsersController');
});

Route::get('login', 'LoginController@index')->name('login');
Route::get('logout', 'LoginController@logout');
Route::post('login', 'LoginController@authenticate');

Route::get('/testlinenoti', 'DemoController@testlinenoti');
Route::get('/testexcel', 'DemoController@testexcel');



