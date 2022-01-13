<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Role;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

/* Route::get('/', function () {
    return view('home');
}); */

/* Route::get('/login', function () {
    return view('login');
}); */

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
Route::get('/login','RoleController@showallroles');

Route::get('/roles','RoleController@index');
Route::get('/roles/{id}','RoleController@show');
Route::post('/roles/create','RoleController@store');
Route::put('/roles/update/{id}','RoleController@update');
Route::delete('/roles/delete/{id}','RoleController@destroy');
//Routes for Users
Route::get('/users/loguser','UserController@loguser');
Route::get('/logout','UserController@logout');

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
Route::get('/','GameController@showtrends');

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
//Routes for Library
Route::get('/libraries','LibraryController@index');
Route::get('/libraries/{id}','LibraryController@show');
Route::post('/libraries/create','LibraryController@store');
Route::put('/libraries/update/{id}','LibraryController@update');
Route::delete('/libraries/delete/{id}','LibraryController@destroy');
//Routes for PaymentMethod
Route::get('/paymentmethods','PaymentMethodController@index');
Route::get('/paymentmethods/{id}','PaymentMethodController@show');
Route::post('/paymentmethods/create','PaymentMethodController@store');
Route::put('/paymentmethods/update/{id}','PaymentMethodController@update');
Route::delete('/paymentmethods/delete/{id}','PaymentMethodController@destroy');
//Routes for Bank
Route::get('/banks','BankController@index');
Route::get('/banks/{id}','BankController@show');
Route::post('/banks/create','BankController@store');
Route::put('/banks/update/{id}','BankController@update');
Route::delete('/banks/delete/{id}','BankController@destroy');
//Routes for Comment
Route::get('/comments','CommentController@index');
Route::get('/comments/{id}','CommentController@show');
Route::post('/comments/create','CommentController@store');
Route::put('/comments/update/{id}','CommentController@update');
Route::delete('/comments/delete/{id}','CommentController@destroy');
//Routes for Follower
Route::get('/followers','CommentController@index');
Route::get('/followers/{id}','CommentController@show');
Route::post('/followers/create','CommentController@store');
Route::put('/followers/update/{id}','CommentController@update');
Route::delete('/followers/delete/{id}','CommentController@destroy');
//Routes for GameKind
Route::get('/gamekinds','GameKindController@index');
Route::get('/gamekinds/{id}','GameKindController@show');
Route::post('/gamekinds/create','GameKindController@store');
Route::put('/gamekinds/update/{id}','GameKindController@update');
Route::delete('/gamekinds/delete/{id}','GameKindController@destroy');
//Routes for Kind
Route::get('/kinds','KindController@index');
Route::get('/kinds/{id}','KindController@show');
Route::post('/kinds/create','KindController@store');
Route::put('/kinds/update/{id}','KindController@update');
Route::delete('/kinds/delete/{id}','KindController@destroy');
//Routes for Message
Route::get('/messages','MessageController@index');
Route::get('/messages/{id}','MessageController@show');
Route::post('/messages/create','MessageController@store');
Route::put('/messages/update/{id}','MessageController@update');
Route::delete('/messages/delete/{id}','MessageController@destroy');
//Routes for MethodBank
Route::get('/methodbanks','MethodBankController@index');
Route::get('/methodbanks/{id}','MethodBankController@show');
Route::post('/methodbanks/create','MethodBankController@store');
Route::put('/methodbanks/update/{id}','MethodBankController@update');
Route::delete('/methodbanks/delete/{id}','MethodBankController@destroy');
//Routes for RolePermission
Route::get('/rolepermissions','RolePermissionController@index');
Route::get('/rolepermissions/{id}','RolePermission@show');
Route::post('/rolepermissions/create','RolePermission@store');
Route::put('/rolepermissions/update/{id}','RolePermission@update');
Route::delete('/rolepermissions/delete/{id}','RolePermission@destroy');
//Routes for RoleUser
Route::get('/roleusers','RoleUserController@index');
Route::get('/roleusers/{id}','RoleUserController@show');
Route::post('/roleusers/create','RoleUserController@store');
Route::put('/roleusers/update/{id}','RoleUserController@update');
Route::delete('/roleusers/delete/{id}','RoleUserController@destroy');






