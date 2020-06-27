<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Employee\GamesFinderController;
use Illuminate\Support\Facades\View;
use App\Game;
use App\Developer;
use App\Console;

class FullGameDataController extends Controller {
	public function __construct() {
		$this->middleware('guest');
	}

	protected function getFullGameData($gameName) {
		$game = Game::where('name', $gameName)->first();
		$gFC = new GamesFinderController;
		$devsArray = $gFC->getDevsArray($gameName);
		$consolesArray = $gFC->getConsolesArray($gameName);
		return View::make('employeeuser/games/fullgamedata')->with('game', $game)->with('devs', $devsArray)->with('consoles', $consolesArray);
	}
}
