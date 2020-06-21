<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Game;
use App\Developer;
use App\Console;
use Illuminate\Database\QueryException;

class AddGameController extends Controller {
	public function __construct() {
		$this->middleware('guest');
	}

	protected function index(Request $request) {
		$request->validate([
			'nombre' => ['required', 'string'],
			'desarrolladores' => ['required', 'string'],
			'año' => ['required', 'numeric', 'min:1950'],
			'ESRB' => ['nullable', 'string'],
			'portada' => ['required', 'image'],
			'contraportada' => ['nullable', 'image'],
			'precio-nuevo' => ['required', 'numeric', 'min:0'],
			'precio-usado' => ['required', 'numeric', 'min:0'],
			'consolas' => ['required', 'string'],
		]);
		return $this->saveInDatabaseAndReturn($request);
	}

	protected function saveInDatabaseAndReturn(Request $request) {
		try { $this->saveGame($request); }
		catch (QueryException $ex) { return back()->with('error', "ERROR AL ALMACENAR EL JUEGO: Ya existe un juego en la base de datos con el nombre " . $request->input('nombre') . "."); }
		
		$this->saveEntity($request->input('nombre'), $request->input('desarrolladores'), "createDeveloper");
		
		try { $this->saveEntity($request->input('nombre'), $request->input('consolas'), "createConsole"); }
		catch (QueryException $ex) { return back()->with('error', "ERROR AL ALMACENAR EL LA DISPONIBLIDAD EN CONSOLAS: La sintaxis usada en el campo correspondiente a las Consolas no es correcta."); }
		
		return back()->with('success','¡Juego almacenado con ÉXITO!');
	}


	private function saveGame(Request $request) {
		$coverContent = $this->getContent($request, "portada");
		$countercoverContent = null;
		if ($request->file('contraportada') != null)
			$countercoverContent = $this->getContent($request, "contraportada");
	
		Game::create([
			'name' => $request->input('nombre'),
			'release_year' => $request->input('año'),
			'esrb_rating' => $request->input('ESRB'),
			'cover' => base64_encode($coverContent),
			'counter_cover' => base64_encode($countercoverContent),
			'price_new' => $request->input('precio-nuevo'),
			'price_used' => $request->input('precio-usado')
		]);
	}
	private function getContent(Request $request, String $input) {
		$inputValue = $request->file($input);
		return $inputValue->openfile()->fread($inputValue->getSize());
	}

	private function saveEntity(String $gameName, String $allItems, $createFunction) {
		$pos = strpos($allItems, ";");
		while ($pos != false) {
			$oneItem = $this->getFirst($allItems, $pos);
			$this->$createFunction($oneItem, $gameName);
			$allItems = $this->getRest($allItems, $pos);
			$pos = strpos($allItems, ";");
		}
		if (strlen($allItems) >= 1) { //Check if the input ended with ';' or not.
			$allItems = $this->removeSpaceAt($allItems, strlen($allItems)-1, 0, strlen($allItems)-1);
			$this->$createFunction($allItems, $gameName);
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
