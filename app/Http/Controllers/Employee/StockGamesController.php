<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Employee\GamesFinderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Game;
use App\Console;

class StockGamesController extends Controller {
	protected function changeGameStock(String $gameName, String $consoleName, String $newOrUsed, int $value) {
		$console = Console::where([
			['game_name', '=', $gameName],
			['console_name', '=', $consoleName]
		])->get();
		$toUpdate = (strcmp($newOrUsed, "new") == 0) ? 'new_copies' : 'used_copies';
		
		$finalValue = $console[0]->$toUpdate + $value;
		$gamesFinderController = new GamesFinderController;
		$game = Game::where('name', $gameName)->first();
		if ($finalValue >= 0) {
			$console[0]->update([
				$toUpdate => $finalValue
			]);
			return back()->with('gameDevsConsoles', [$gamesFinderController->getGameInfo($game)]);
		}
		else
			return back()->with('gameDevsConsoles', [$gamesFinderController->getGameInfo($game)])->with('message', "ERROR AL MODIFICAR EL STOCK DEL JUEGO " . $gameName . ": La cantidad final de las copias debe ser mayor o igual a cero.");
	}
}
