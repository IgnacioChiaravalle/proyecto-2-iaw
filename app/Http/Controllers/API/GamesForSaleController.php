<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Employee\StockGamesController;
use App\Game;
use App\Developer;
use App\Console;

class GamesForSaleController extends Controller {
	public function __construct() {
		$this->middleware('guest');
	}

	protected function getAllGames() {
		return Game::select('name', 'release_year', 'esrb_rating', 'price_new', 'price_used')->orderBy('name', 'asc')->get();
	}
	protected function getGame($gameName) {
		return Game::select('name', 'release_year', 'esrb_rating', 'price_new', 'price_used')->where('name', $gameName)->first();
	}
	protected function getGameCovers($gameName) {
		return Game::select('cover', 'counter_cover')->where('name', $gameName)->first();
	}

	protected function getDevsList() {
		return Developer::select('dev_name')->distinct()->orderBy('dev_name', 'asc')->get();
	}
	protected function getGameDevs($gameName) {
		return Developer::where('game_name', $gameName)->orderBy('dev_name', 'asc')->get();
	}

	protected function getConsolesList() {
		return Console::select('console_name')->distinct()->orderBy('console_name', 'asc')->get();
	}
	protected function getGameConsoles($gameName) {
		return Console::where('game_name', $gameName)->orderBy('console_name', 'asc')->get();
	}
	protected function getGameConsoleCopies($gameName, $consoleName) {
		return Console::where('game_name', $gameName)->where('console_name', $consoleName)->orderBy('console_name', 'asc')->get();
	}

	protected function changeGameStock(String $gameName, String $consoleName, String $newOrUsed, int $value) {
		$sGC = new StockGamesController;
		$sGC->changeGameStock($gameName, $consoleName, $newOrUsed, $value);
		return $this->getGameConsoleCopies($gameName, $consoleName);
	}
}
