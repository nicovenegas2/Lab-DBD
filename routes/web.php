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
//Routes for Voucher
Route::get('/vouchers','VoucherController@index');
Route::get('/vouchers/{id}','VoucherController@show');
Route::post('/vouchers/create','VoucherController@store');
Route::put('/vouchers/update/{id}','VoucherController@update');
Route::delete('/vouchers/delete/{id}','VoucherController@destroy');
//Routes for Game
Route::get('/games','GameController@index');
Route::get('/games/{id}','GameController@show');
Route::post('/games/create','GameController@store');
Route::put('/games/update/{id}','GameController@update');
Route::delete('/games/delete/{id}','GameController@destroy');
//Routes for CountryGame
Route::get('/countrygames','CountryGameController@index');
Route::get('/countrygames/{id}','CountryGameController@show');
Route::post('/countrygames/create','CountryGameController@store');
Route::put('/countrygames/update/{id}','CountryGameController@update');
Route::delete('/countrygames/delete/{id}','CountryGameController@destroy');
//Routes for Like
Route::get('/likes','LikeController@index');
Route::get('/likes/{id}','LikeController@show');
Route::post('/likes/create','LikeController@store');
Route::put('/likes/update/{id}','LikeController@update');
Route::delete('/likes/delete/{id}','LikeController@destroy');
//Routes for WishList
Route::get('/wishlists','WishListController@index');
Route::get('/wishlists/{id}','WishListController@show');
Route::post('/wishlists/create','WishListController@store');
Route::put('/wishlists/update/{id}','WishListController@update');
Route::delete('/wishlists/delete/{id}','WishListController@destroy');
//Routes for ContentVoucher
Route::get('/contentvouchers','ContentVoucherController@index');
Route::get('/contentvouchers/{id}','ContentVoucherController@show');
Route::post('/contentvouchers/create','ContentVoucherController@store');
Route::put('/contentvouchers/update/{id}','ContentVoucherController@update');
Route::delete('/contentvouchers/delete/{id}','ContentVoucherController@destroy');
//Routes for Developer
Route::get('/developers','DeveloperController@index');
Route::get('/developers/{id}','DeveloperController@show');
Route::post('/developers/create','DeveloperController@store');
Route::put('/developers/update/{id}','DeveloperController@update');
Route::delete('/developers/delete/{id}','DeveloperController@destroy');
