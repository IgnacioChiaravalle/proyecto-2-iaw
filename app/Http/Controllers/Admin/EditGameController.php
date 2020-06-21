<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Game;
use App\Developer;
use App\Console;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EditGameController extends Controller {
	public function __construct() {
		$this->middleware('guest');
	}

	protected function index(Request $request) {
		$request->validate([
			'nombre' => ['required', 'string'],
			'desarrolladores' => ['nullable', 'string'],
			'año' => ['nullable', 'numeric', 'min:1950'],
			'ESRB' => ['nullable', 'string'],
			'portada' => ['nullable', 'image'],
			'contraportada' => ['nullable', 'image'],
			'precio-nuevo' => ['nullable', 'numeric', 'min:0'],
			'precio-usado' => ['nullable', 'numeric', 'min:0'],
			'consolas' => ['nullable', 'string'],
		]);
		return $this->editInDatabaseAndReturn($request);
	}
	
	protected function editInDatabaseAndReturn(Request $request) {
		try { $this->updateGame($request); }
		catch (ModelNotFoundException $ex) { return back()->with('error', "ERROR AL EDITAR EL JUEGO: No hay un juego con nombre " . $request->input('nombre') . " en la base de datos."); }
		
		if ($request->input('desarrolladores') != null) {
			Developer::where('game_name', $request->input('nombre'))->delete();
			$this->updateEntity($request->input('nombre'), $request->input('desarrolladores'), "createDeveloper");
		}
		
		if ($request->input('consolas') != null){
			Console::where('game_name', $request->input('nombre'))->delete();
			try { $this->updateEntity($request->input('nombre'), $request->input('consolas'), "createConsole"); }
			catch (QueryException $ex) { return back()->with('error', "ERROR AL EDITAR EL LA DISPONIBLIDAD EN CONSOLAS: La sintaxis usada en el campo correspondiente a las Consolas no es correcta."); }
		}

		return back()->with('success','¡Juego editado con ÉXITO!');
	}
	

	private function updateGame(Request $request) {
		GAME::where('name', $request->input('nombre'))->firstOrFail(); //Verify that the game is stored. 
		$requestArray = $this->getRequestArray($request, $request->input('nombre'));
		Game::where('name', $request->input('nombre'))->update([
			'release_year' => $requestArray[0],
			'esrb_rating' => $requestArray[1],
			'cover' => $requestArray[2],
			'counter_cover' => $requestArray[3],
			'price_new' => $requestArray[4],
			'price_used' => $requestArray[5],
		]);
	}
	private function getRequestArray(Request $request, String $gameName) {
		$requestArray = [];

		array_push($requestArray, $request->input('año') ?? Game::where('name', $gameName)->pluck('release_year')[0]);
		array_push($requestArray, $request->input('ESRB') ?? Game::where('name', $gameName)->pluck('esrb_rating')[0]);

		if ($request->file('portada') != null)
			array_push($requestArray, base64_encode($this->getContent($request, "portada")));
		else
			array_push($requestArray, Game::where('name', $gameName)->pluck('cover')[0]);
		
		if ($request->file('contraportada') != null)
			array_push($requestArray, base64_encode($this->getContent($request, "contraportada")));
		else
			array_push($requestArray, Game::where('name', $gameName)->pluck('counter_cover')[0]);
		
		array_push($requestArray, $request->input('precio-nuevo') ?? Game::where('name', $gameName)->pluck('price_new')[0]);
		array_push($requestArray, $request->input('precio-usado') ?? Game::where('name', $gameName)->pluck('price_used')[0]);

		return $requestArray;
	}
	private function getContent(Request $request, String $input) {
		$inputValue = $request->file($input);
		return $inputValue->openfile()->fread($inputValue->getSize());
	}


	private function updateEntity(String $gameName, String $allItems, $updateFunction) {
		$pos = strpos($allItems, ";");
		while ($pos != false) {
			$oneItem = $this->getFirst($allItems, $pos);
			$this->$updateFunction($oneItem, $gameName);
			$allItems = $this->getRest($allItems, $pos);
			$pos = strpos($allItems, ";");
		}
		if (strlen($allItems) >= 1) { //Check if the input ended with ';' or not.
			$allItems = $this->removeSpaceAt($allItems, strlen($allItems)-1, 0, strlen($allItems)-1);
			$this->$updateFunction($allItems, $gameName);
		}
	}

	private function createDeveloper(String $developer, String $gameName) {
		Developer::create([
			'game_name' => $gameName,
			'dev_name' => $developer
		]);
	}

	private function createConsole(String $consoleNewUsed, String $gameName) {
		$consoleName = $this->getConsoleName($consoleNewUsed);
		$newCopies = $this->getCopies($consoleNewUsed, 1);
		$usedCopies = $this->getCopies($consoleNewUsed, 2);
		Console::create([
			'game_name' => $gameName,
			'console_name' => $consoleName,
			'new_copies' => $newCopies,
			'used_copies' => $usedCopies
		]);
	}
	private function getConsoleName(String $consoleNewUsed) {
		$pos = strpos($consoleNewUsed, "-");
		return $this->getFirst($consoleNewUsed, $pos);
	}
	private function getCopies(String $consoleNewUsed, int $valueNumber) {
		$pos = strpos($consoleNewUsed, "-");
		$newUsed = $this->getRest($consoleNewUsed, $pos);
		$pos = strpos($newUsed, "-");
		if ($valueNumber == 1)
			return $this->getFirst($newUsed, $pos);
		else
			return $this->getRest($newUsed, $pos);
	}


	private function getFirst(String $all, int $posOfDelimiter) {
		$first = substr($all, 0, $posOfDelimiter);
		$first = $this->removeSpaceAt($first, $posOfDelimiter-1, 0, $posOfDelimiter-1);
		return $first;
	}
	private function getRest(String $all, int $posOfDelimiter) {
		$rest = substr($all, $posOfDelimiter + 1);
		$rest = $this->removeSpaceAt($rest, 0, 1, strlen($rest)-1);
		return $rest;
	}
	private function removeSpaceAt(String $string, int $index, int $newStart, $newLength) {
		if (substr($string, $index, 1) == " ")
			$string = substr($string, $newStart, $newLength);
		return $string;
	}

}
