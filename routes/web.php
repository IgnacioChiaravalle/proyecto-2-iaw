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
})->middleware('adminAuth');

//ADMIN - GAMES:
Route::get('/addgame', function () {
	return view('adminuser\games\addgame');
})->middleware('adminAuth');
Route::post('addgame', 'Admin\AddGameController@index')->middleware('adminAuth');

Route::get('/editgame', function () {
	return view('adminuser\games\editgame');
})->middleware('adminAuth');
Route::post('editgame', 'Admin\EditGameController@index')->middleware('adminAuth');

Route::get('/removegame', function () {
	return view('adminuser\games\removegame');
})->middleware('adminAuth');
Route::post('removegame', 'Admin\RemoveGameController@index')->middleware('adminAuth');

//ADMIN - MERCH:
Route::get('/addmerch', function () {
	return view('adminuser\merch\addmerch');
})->middleware('adminAuth');
Route::post('addmerch', 'Admin\AddMerchItemController@index')->middleware('adminAuth');

Route::get('/editmerch', function () {
	return view('adminuser\merch\editmerch');
})->middleware('adminAuth');
Route::post('editmerch', 'Admin\EditMerchItemController@index')->middleware('adminAuth');

Route::get('/removemerch', function () {
	return view('adminuser\merch\removemerch');
})->middleware('adminAuth');
Route::post('removemerch', 'Admin\RemoveMerchItemController@index')->middleware('adminAuth');


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