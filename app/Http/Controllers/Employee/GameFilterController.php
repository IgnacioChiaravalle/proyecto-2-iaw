<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Employee\GamesFinderController;
use Illuminate\Support\Facades\View;
use App\Game;
use App\Developer;
use App\Console;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GameFilterController extends Controller {
	public function __construct() {
		$this->middleware('guest');
	}

	protected function filterByYear($year) {
		return $this->filterByGameAttribute('release_year', $year);
	}
	protected function filterByESRB($esrb) {
		if (strcmp($esrb, "null") == 0)
			$esrb = null;
		return $this->filterByGameAttribute('esrb_rating', $esrb);
	}
	protected function filterByNewPrice($newPriceInteger, $newPriceDecimal) {
		return $this->filterByGameAttribute('price_new', $newPriceInteger + ($newPriceDecimal / 100));
	}
	protected function filterByUsedPrice($usedPriceInteger, $usedPriceDecimal) {
		return $this->filterByGameAttribute('price_used', $usedPriceInteger + ($usedPriceDecimal / 100));
	}
	protected function filterByDeveloper($devName) {
		$developers = Developer::where('dev_name', $devName)->get();
		return $this->findGamesOfFilter($developers, "game_name");
	}
	protected function filterByConsole($consoleName) {
		$consoles = Console::where('console_name', $consoleName)->get();
		return $this->findGamesOfFilter($consoles, "game_name");
	}

	private function filterByGameAttribute($modelAttribute, $parameterAttribute) {
		$games = Game::where($modelAttribute, $parameterAttribute)->get();
		return $this->findGamesOfFilter($games, "name");
	}

	private function findGamesOfFilter($filterModel, $nameString) {
		$gamesOfFilterModel = [];
		foreach ($filterModel as $filterModelRow)
			array_push($gamesOfFilterModel, Game::where('name', $filterModelRow->$nameString)->first());
		$gameDevsConsoles = [];
		$gFC = new GamesFinderController;
		foreach($gamesOfFilterModel as $game)
			array_push($gameDevsConsoles, $gFC->getGameInfo($game));
		return View::make('employeeuser/games/stockgames')->with('gameDevsConsoles', $gameDevsConsoles);
	}
}
