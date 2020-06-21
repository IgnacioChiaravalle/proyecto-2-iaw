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

//LOGIN AND SITES:
Route::get('/', function () {
	return view('auth\login');
});
Route::get('/inicio', function () {
	return view('auth\login');
});
Route::get('/login', function () {
	return view('auth\login');
});

Route::get('/welcome', function () {
	return view('welcome');
});

Route::get('/register', function () {
	return view('auth\register');
});

Route::get('/adminsite', function () {
	return view('adminuser\adminsite');
});


//ADMIN - GAMES:
Route::get('/addgame', function () {
	return view('adminuser\games\addgame');
});
Route::post('addgame', 'Admin\AddGameController@index');

Route::get('/editgame', function () {
	return view('adminuser\games\editgame');
});
Route::post('editgame', 'Admin\EditGameController@index');

Route::get('/removegame', function () {
	return view('adminuser\games\removegame');
});
Route::post('removegame', 'Admin\RemoveGameController@index');


//ADMIN - MERCH:
Route::get('/addmerch', function () {
	return view('adminuser\merch\addmerch');
});
Route::post('addmerch', 'Admin\AddMerchItemController@index');

Route::get('/editmerch', function () {
	return view('adminuser\merch\editmerch');
});
Route::post('editmerch', 'Admin\EditMerchItemController@index');

Route::get('/removemerch', function () {
	return view('adminuser\merch\removemerch');
});
Route::post('removemerch', 'Admin\RemoveMerchItemController@index');


Auth::routes();