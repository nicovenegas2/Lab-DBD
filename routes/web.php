<?php

use Illuminate\Support\Facades\Route;

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
//Routes for User
Route::get('/users','UserController@index');
Route::get('/users/{id}','UserController@show');
Route::post('/users/create','UserController@store');
Route::put('/users/update/{id}','UserController@update');
Route::delete('/users/delete/{id}','UserController@destroy');

//Routes for Follower
Route::get('/followers','FollowerController@index');
Route::get('/followers/{id}','FollowerController@show');
Route::post('/followers/create','FollowerController@store');
Route::put('/followers/update/{id}','FollowerController@update');
Route::delete('/followers/delete/{id}','FollowerController@destroy');


//Routes for Message
Route::get('/messages','MessageController@index');
Route::get('/messages/{id}','MessageController@show');
Route::post('/messages/create','MessageController@store');
Route::put('/messages/update/{id}','MessageController@update');
Route::delete('/messages/delete/{id}','MessageController@destroy');