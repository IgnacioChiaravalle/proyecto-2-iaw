<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

//GAMES:
Route::get('gamesforsale', 'API\GamesForSaleController@getAllGames')->middleware('auth:api');
Route::get('gamesforsale/getgame/{gameName}', 'API\GamesForSaleController@getGame')->middleware('auth:api');
Route::get('gamesforsale/getgamecovers/{gameName}', 'API\GamesForSaleController@getGameCovers')->middleware('auth:api');

Route::get('gamesforsale/getdevslist/', 'API\GamesForSaleController@getDevsList')->middleware('auth:api');
Route::get('gamesforsale/getgamedevs/{gameName}', 'API\GamesForSaleController@getGameDevs')->middleware('auth:api');

Route::get('gamesforsale/getconsoleslist/', 'API\GamesForSaleController@getConsolesList')->middleware('auth:api');
Route::get('gamesforsale/getgameconsoles/{gameName}', 'API\GamesForSaleController@getGameConsoles')->middleware('auth:api');
Route::get('gamesforsale/getgameconsolecopies/{gameName}/{consoleName}', 'API\GamesForSaleController@getGameConsoleCopies')->middleware('auth:api');

Route::get('gamesforsale/changegamestock/{gameName}/{consoleName}/{newOrUsed}/{value}', 'API\GamesForSaleController@changeGameStock')->middleware('auth:api');


//MERCH:
Route::get('merchforsale', 'API\MerchForSaleController@getAllMerchItems')->middleware('auth:api');
Route::get('merchforsale/getmerch/{merchName}', 'API\MerchForSaleController@getMerchItem')->middleware('auth:api');
Route::get('merchforsale/getmerchphoto/{merchName}', 'API\MerchForSaleController@getMerchItemPhoto')->middleware('auth:api');

Route::get('merchforsale/getcategorieslist/', 'API\MerchForSaleController@getCategoriesList')->middleware('auth:api');
Route::get('merchforsale/getmerchcategories/{merchName}', 'API\MerchForSaleController@getMerchItemCategories')->middleware('auth:api');

Route::get('merchforsale/changemerchstock/{merchName}/{value}', 'API\MerchForSaleController@changeMerchStock')->middleware('auth:api');