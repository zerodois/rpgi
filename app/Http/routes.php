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
Route::post('/sigup', 'UserController@sigup');
Route::get('/login',  'UserController@login');
Route::get('/logout', 'UserController@logout');

Route::get('/file/{filename}', 'FileController@view');
Route::delete('/file/{filename}', 'FileController@delete');

Route::post('/api/upload', 'FileController@upload');
Route::get('/api/file', 'FileController@lista');
