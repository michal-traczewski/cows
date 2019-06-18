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

Route::get('/', 'IndexController@index');
Route::post('/add_daily_output', 'IndexController@addDailyOutput');
Route::get('/addcow', 'CowController@addCowForm');
Route::post('/addcow', 'CowController@addCow');
Route::get('/editcow/{id}', 'CowController@editCowForm')->where('id', '[0-9]+');
Route::post('/editcow/{id}', 'CowController@editCow')->where('id', '[0-9]+');
Route::get('/logout' , 'Auth\LoginController@logout');
Route::get('/profile', 'UserController@editUser');
Route::post('/profile', 'UserController@updateUser');

Auth::routes();
