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

Route::get('/addgame', function () {
	return view('adminuser\games\addgame');
});
Route::get('/editgame', function () {
	return view('adminuser\games\editgame');
});
Route::get('/removegame', function () {
	return view('adminuser\games\removegame');
});

Route::get('/addmerch', function () {
	return view('adminuser\merch\addmerch');
});
Route::get('/editmerch', function () {
	return view('adminuser\merch\editmerch');
});
Route::get('/removemerch', function () {
	return view('adminuser\merch\removemerch');
});


Auth::routes();


//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/register', 'AccessRegisterController@getRegisterView'); //I think it is making "register" ambiguous.