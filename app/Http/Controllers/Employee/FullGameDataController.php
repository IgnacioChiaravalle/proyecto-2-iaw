<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Employee\GamesFinderController;
use Illuminate\Support\Facades\View;
use App\Game;
use App\MerchItem;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FullGameDataController extends Controller {
	public function __construct() {
		$this->middleware('guest');
	}

	protected function getFullGameData($gameName) {
		$game = Game::where('name', $gameName)->first();
		$gFC = new GamesFinderController;
		$devsArray = $gFC->getDevsArray($gameName);
		$consolesArray = $gFC->getConsolesArray($gameName);
		try {
			MerchItem::where('origin_media', $gameName)->firstOrFail();
			return View::make('employeeuser.games.fullgamedata')->with('game', $game)->with('devs', $devsArray)->with('consoles', $consolesArray)->with('found', true);
		}
		catch (ModelNotFoundException $ex) {
			return View::make('employeeuser.games.fullgamedata')->with('game', $game)->with('devs', $devsArray)->with('consoles', $consolesArray)->with('found', false);
		}
	}
}
