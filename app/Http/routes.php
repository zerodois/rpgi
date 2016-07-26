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

Route::get('/', function () {
    return view('index');
});

Route::post('/login', 'UserController@sigin');
Route::post('/auth/sigup', 'UserController@sigup');
Route::get('/login',  'UserController@login');
Route::get('/logout', 'UserController@logout');
Route::get('/confirm/{id}', 'UserController@confirma');
Route::post('/auth/reset', 'UserController@reset');

Route::get('/api/file/{filename}', 'FileController@retrieveFile');
Route::get('/file/{id}', 'FileController@view');
Route::get('/file/download/{id}', 'FileController@download');
Route::delete('/file/{id}', 'FileController@delete');

Route::post('/api/upload', 'FileController@upload');
Route::get('/api/file', 'FileController@lista');

Route::get('/mail', 'MailController@email');
Route::post('/api/mail', 'MailController@mail');
Route::post('/mail/reset', 'MailController@mailReset');
/*
Route::get('/mail', function(){
	dd(Config::get('mail'));
});
*/