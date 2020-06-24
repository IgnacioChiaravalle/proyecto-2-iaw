<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Employee\GamesFinderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Game;
use App\Developer;
use App\Console;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FilterController extends Controller {
	public function __construct() {
		$this->middleware('guest');
	}

	protected function filterByConsole($consoleName) {
		$console = Console::where('console_name', $consoleName)->get();
		return $this->findGamesOfFilter($console);
		
		/*$gamesOfConsoleNames = [];
		foreach ($console as $consoleRow)
			array_push($gamesOfConsoleNames, Game::where('name', $consoleRow->game_name)->first());
		$gameDevsConsoles = []; $gFC = new GamesFinderController;
		foreach($gamesOfConsoleNames as $game)
			array_push($gameDevsConsoles, $gFC->getGameInfo($game));
		return View::make('employeeuser/games/stockgames')->with('gameDevsConsoles', $gameDevsConsoles);*/
	}

	protected function filterByDeveloper($devName) {
		$developer = Developer::where('dev_name', $devName)->get();
		return $this->findGamesOfFilter($developer);
	}

	private function findGamesOfFilter($filterModel) {
		$gamesOfFilterModel = [];
		foreach ($filterModel as $filterModelRow)
			array_push($gamesOfFilterModel, Game::where('name', $filterModelRow->game_name)->first());
		$gameDevsConsoles = []; $gFC = new GamesFinderController;
		foreach($gamesOfFilterModel as $game)
			array_push($gameDevsConsoles, $gFC->getGameInfo($game));
		return /*redirect()->route('stockgames')*/View::make('employeeuser/games/stockgames')->with('gameDevsConsoles', $gameDevsConsoles); //View::make('employeeuser/games/stockgames')
	}
}
