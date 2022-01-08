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
//Routes for Country 
Route::get('/countries','CountryController@index');
Route::get('/countries/{id}','CountryController@show');
Route::post('/countries/create','CountryController@store');
Route::put('/countries/update/{id}','CountryController@update');
Route::delete('/countries/delete/{id}','CountryController@destroy');
//Routes for Permission
Route::get('/permissions','PermissionController@index');
Route::get('/permissions/{id}','PermissionController@show');
Route::post('/permissions/create','PermissionController@store');
Route::put('/permissions/update/{id}','PermissionController@update');
Route::delete('/permissions/delete/{id}','PermissionController@destroy');
//Routes for Roles
Route::get('/roles','RoleController@index');
Route::get('/roles/{id}','RoleController@show');
Route::post('/roles/create','RoleController@store');
Route::put('/roles/update/{id}','RoleController@update');
Route::delete('/roles/delete/{id}','RoleController@destroy');
//Routes for Users
Route::get('/users','UserController@index');
Route::get('/users/{id}','UserController@show');
Route::post('/users/create','UserController@store');
Route::put('/users/update/{id}','UserController@update');
Route::delete('/users/delete/{id}','UserController@destroy');