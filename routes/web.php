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

//LOGIN AND REGISTER:
Route::get('/', function () {
	return view('auth\login');
});
Route::get('/inicio', function () {
	return view('auth\login');
});
Route::get('/home', function () {
	return view('auth\login');
});
Route::get('/login', function () {
	return view('auth\login');
});

Route::get('/welcome', function () { //TO REMOVE
	return view('welcome');
});

Route::get('/register', function () {
	return view('auth\register');
});


//ADMIN - SITE:
Route::get('/adminsite', function () {
	return view('adminuser\adminsite');
})->middleware('auth');

//ADMIN - GAMES:
Route::get('/addgame', function () {
	return view('adminuser\games\addgame');
})->middleware('auth');
Route::post('addgame', 'Admin\AddGameController@index')->middleware('auth');

Route::get('/editgame', function () {
	return view('adminuser\games\editgame');
})->middleware('auth');
Route::post('editgame', 'Admin\EditGameController@index')->middleware('auth');

Route::get('/removegame', function () {
	return view('adminuser\games\removegame');
})->middleware('auth');
Route::post('removegame', 'Admin\RemoveGameController@index')->middleware('auth');

//ADMIN - MERCH:
Route::get('/addmerch', function () {
	return view('adminuser\merch\addmerch');
})->middleware('auth');
Route::post('addmerch', 'Admin\AddMerchItemController@index')->middleware('auth');

Route::get('/editmerch', function () {
	return view('adminuser\merch\editmerch');
})->middleware('auth');
Route::post('editmerch', 'Admin\EditMerchItemController@index')->middleware('auth');

Route::get('/removemerch', function () {
	return view('adminuser\merch\removemerch');
})->middleware('auth');
Route::post('removemerch', 'Admin\RemoveMerchItemController@index')->middleware('auth');


//EMPLOYEE - SITE:
Route::get('/employeesite', function () {
	return view('employeeuser\employeesite');
})->middleware('auth');

//EMPLOYEE - GAMES:
Route::get('/stockgames', 'Employee\StockGamesController@getData')->middleware('auth');/*function () {
	return view('employeeuser\games\stockgames');
});*/
Route::post('stockgames', 'Employee\StockGamesController@index')->middleware('auth');

//EMPLOYEE - MERCH:
Route::get('/stockmerch', function () {
	return view('employeeuser\merch\stockmerch');
})->middleware('auth');
Route::post('stockmerch', 'Employee\StockMerchController@index')->middleware('auth');


//OTHERS:
Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');