<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Game;
use App\Developer;
use App\Console;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GamesFinderController extends Controller {
	public function __construct() {
		$this->middleware('guest');
	}

	protected function getAllGames() {
		$games = Game::orderBy('name', 'asc')->get();
		$gameDevsConsoles = [];
		foreach($games as $game)
			array_push($gameDevsConsoles, $this->getGameInfo($game));
		if (count($gameDevsConsoles) > 0)
			return View::make('employeeuser.games.stockgames')->with('gameDevsConsoles', $gameDevsConsoles);
		else
			return View::make('employeeuser.games.stockgames');
	}

	protected function getGame(Request $request) {
		$request->validate(['nombre' => ['required', 'string']]);
		try {			
			$game = Game::where('name', $request->input('nombre'))->firstOrFail();
			return View::make('employeeuser.games.stockgames')->with('gameDevsConsoles', [$this->getGameInfo($game)]);
		}
		catch (ModelNotFoundException $ex) {
			return back()->with('message', "ERROR AL RECUPERAR EL JUEGO DE LA BASE DE DATOS: No hay un juego con nombre " . $request->input('nombre') . " en la base de datos.");
		}
	}

	public function getGameInfo(Game $game) {
		$gameData = [
			$game->name,
			$game->release_year,
			$game->esrb_rating,
			$game->price_new,
			$game->price_used
		];
		$devsArray = $this->getDevsArray($gameData[0]);
		$consolesArray = $this->getConsolesArray($gameData[0]);
		return [$gameData, $devsArray, $consolesArray];
	}

	public function getDevsArray(String $gameName) {
		$devs = Developer::where('game_name', $gameName)->orderBy('dev_name', 'asc')->get();
		$devsArray = [];
		foreach ($devs as $dev)
			array_push($devsArray, $dev->dev_name);
		return $devsArray;
	}
	public function getConsolesArray(String $gameName) {
		$consoles = Console::where('game_name', $gameName)->orderBy('console_name', 'asc')->get();
		$consolesArray = [];
		foreach ($consoles as $console) {
			$consoleData = [
				$console->console_name,
				$console->new_copies,
				$console->used_copies
			];
			array_push($consolesArray, $consoleData);
		}
		return $consolesArray;
	}
}
