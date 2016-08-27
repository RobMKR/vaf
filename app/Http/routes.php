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

Route::get('/', 'HomeController@index');
Route::get('/contact', 'HomeController@contact');
Route::get('/about', 'HomeController@about');
Route::get('/admin/login', 'AdminController@login');
Route::post('/admin/login', 'AdminController@login');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/addCategory', 'AdminController@addCategory');
    Route::post('/admin/addCategory', 'AdminController@addCategory');
    Route::get('/admin/addPicture', 'AdminController@addPicture');
    Route::get('/admin/lastUpdates', 'AdminController@lastUpdates');
    
});
