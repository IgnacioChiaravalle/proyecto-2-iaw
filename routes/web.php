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

//EMPLOYEE - GAMES (WITH OR WITHOUT FILTERS):
Route::get('stockgames', 'Employee\GamesFinderController@getAllGames')->middleware('auth');
Route::post('searchgame', 'Employee\GamesFinderController@getGame')->middleware('auth');
Route::get('searchgame', function () {
	return view('employeeuser\games\stockgames');
})->middleware('auth');

Route::get('stockgames/getfullgamedata/{gameName}', 'Employee\FullGameDataController@getFullGameData')->middleware('auth');
Route::get('stockgames/filterbyyear/{year}', 'Employee\GameFilterController@filterByYear')->middleware('auth');
Route::get('stockgames/filterbyesrb/{esrb}', 'Employee\GameFilterController@filterByESRB')->middleware('auth');
Route::get('stockgames/filterbynewprice/{newPriceInteger}/{newPriceDecimal}', 'Employee\GameFilterController@filterByNewPrice')->middleware('auth');
Route::get('stockgames/filterbyusedprice/{usedPriceInteger}/{usedPriceDecimal}', 'Employee\GameFilterController@filterByUsedPrice')->middleware('auth');
Route::get('stockgames/filterbydeveloper/{devName}', 'Employee\GameFilterController@filterByDeveloper')->middleware('auth');
Route::get('stockgames/filterbyconsole/{consoleName}', 'Employee\GameFilterController@filterByConsole')->middleware('auth');

Route::get('changegamestock/{gameName}/{consoleName}/{newOrUsed}/{value}', 'Employee\StockGamesController@changeGameStock')->middleware('auth');

//EMPLOYEE - MERCH (WITH OR WITHOUT FILTERS):
Route::get('stockmerch', 'Employee\MerchFinderController@getAllMerch')->middleware('auth');
Route::post('searchmerch', 'Employee\MerchFinderController@getMerchItem')->middleware('auth');
Route::get('searchmerch', function () {
	return view('employeeuser\merch\stockmerch');
})->middleware('auth');

Route::get('stockmerch/getfullmerchdata/{itemName}', 'Employee\FullMerchDataController@getFullMerchData')->middleware('auth');
Route::get('stockmerch/filterbyoriginmedia/{originMedia}', 'Employee\MerchFilterController@filterByOriginMedia')->middleware('auth');
Route::get('stockmerch/filterbyprice/{priceInteger}/{priceDecimal}', 'Employee\MerchFilterController@filterByPrice')->middleware('auth');
Route::get('stockmerch/filterbycategory/{categoryName}', 'Employee\MerchFilterController@filterByCategory')->middleware('auth');

Route::get('changemerchstock/{itemName}/{value}', 'Employee\StockMerchController@changeMerchStock')->middleware('auth');


//OTHERS:
Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');