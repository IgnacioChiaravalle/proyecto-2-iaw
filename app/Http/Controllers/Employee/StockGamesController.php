<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Game;
use App\Developer;
use App\Console;

class StockGamesController extends Controller {
	public function __construct() {
		$this->middleware('guest');
	}

	protected function getData() {
		$games = Game::orderBy('name', 'asc')->get();
		$gamesArray = [];
		foreach($games as $game) {
			$gameData = [
				$game->name,
				$game->release_year,
				$game->esrb_rating,
				$game->price_new,
				$game->price_used
			];
			array_push($gamesArray, $gameData);
		}
		
		$gameDevsConsoles = [];
		foreach($gamesArray as $gameData) {
			$devsArray = $this->getDevsArray($gameData);
			$consolesArray = $this->getConsolesArray($gameData);
			array_push($gameDevsConsoles, [$gameData, $devsArray, $consolesArray]);
		}
		if (count($gameDevsConsoles) > 0)
			return View::make('employeeuser/games/stockgames')->with('gameDevsConsoles',$gameDevsConsoles);
		else
			return View::make('employeeuser/games/stockgames');
	}

	private function getDevsArray(array $gameData) {
		$devs = Developer::where('game_name', $gameData[0])->orderBy('dev_name', 'asc')->get();
		$devsArray = [];
		foreach ($devs as $dev)
			array_push($devsArray, $dev->dev_name);
		return $devsArray;
	}

	private function getConsolesArray(array $gameData) {
		$consoles = Console::where('game_name', $gameData[0])->orderBy('console_name', 'asc')->get();
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

	/*private function printArrayTheWayGodIntendsItFFS(array $gameDevsConsoles) {
		echo "{ ";
		foreach ($gameDevsConsoles as $gDC) {
			echo "[ Game=( ";
			foreach ($gDC[0] as $gameAttribute)
				echo $gameAttribute . " ";
			echo ") ; Devs=( ";
			foreach ($gDC[1] as $dev)
				echo $dev . " ";
			echo ") ; Consoles=( ";
			foreach ($gDC[2] as $consoleData) {
				echo "/ ";
				foreach ($consoleData as $consoleAttribute)
					echo $consoleAttribute . " ";
				echo "\ ";
			}
			echo ") ]          ;          ";

		}
		echo " }";
	}*/
}
