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
/* ehoiwhkrjehw */

Route::get('/', 'PagesController@index');

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    
    Route::get('/home', 'PagesController@home');
    Route::get('/addkey', 'PagesController@addKey');
    Route::get('/addfob', 'PagesController@addFob');
    Route::get('/dashboard', 'PagesController@dashboard');

    Route::post('/register', 'DashboardController@createUser');
    Route::patch('/edit-user-rights', 'DashboardController@editUserRights');
    Route::get('/reserve/{key}', 'KeyController@toReservation');
    Route::get('/edit/{key}', 'KeyController@edit');
    Route::patch('/reserve/{key}', 'KeyController@update');
    Route::patch('/editkey/{key}', 'KeyController@update');
    Route::patch('/return/{key}', 'KeyController@update');
    Route::post('/addkey', 'KeyController@create');
    Route::delete('/delete/{key}', 'KeyController@destroy');

    Route::get('/reservefob/{fob}', 'FobController@toReservation');
    Route::get('/editfob/{fob}', 'FobController@edit');
    Route::patch('/reservefob/{fob}', 'FobController@update');
    Route::patch('/editfob/{fob}', 'FobController@update');
    Route::patch('/returnfob/{fob}', 'FobController@update');
    Route::post('/addfob', 'FobController@create');
    Route::delete('/deletefob/{fob}', 'FobController@destroy');
});




