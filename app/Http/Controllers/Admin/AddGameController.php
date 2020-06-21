<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\FunctionHouseController;
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
		$functionHouseController = new FunctionHouseController;

		try { $this->saveGame($functionHouseController, $request); }
		catch (QueryException $ex) { return back()->with('error', "ERROR AL ALMACENAR EL JUEGO: Ya existe un juego en la base de datos con el nombre " . $request->input('nombre') . "."); }
		
		$functionHouseController->handleMultipleValueInput($this, $request->input('nombre'), $request->input('desarrolladores'), "createDeveloper");
		
		try { $functionHouseController->handleMultipleValueInput($this, $request->input('nombre'), $request->input('consolas'), "createConsole"); }
		catch (QueryException $ex) { return back()->with('error', "ERROR AL ALMACENAR LA DISPONIBLIDAD EN CONSOLAS: La sintaxis usada en el campo correspondiente a las Consolas no es correcta."); }
		
		return back()->with('success','¡Juego almacenado con ÉXITO!');
	}

	private function saveGame(Controller $functionHouseController, Request $request) {
		$coverContent = $functionHouseController->getContent($request, "portada");
		$countercoverContent = null;
		if ($request->file('contraportada') != null)
			$countercoverContent = $functionHouseController->getContent($request, "contraportada");
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
	
	public function createDeveloper(Controller $functionHouseController, String $developer, String $gameName) {
		Developer::create([
			'game_name' => $gameName,
			'dev_name' => $developer
		]);
	}

	public function createConsole(Controller $functionHouseController, String $consoleNewUsed, String $gameName) {
		$consoleName = $this->getConsoleName($functionHouseController, $consoleNewUsed);
		$newCopies = $this->getCopies($functionHouseController, $consoleNewUsed, 1);
		$usedCopies = $this->getCopies($functionHouseController, $consoleNewUsed, 2);
		Console::create([
			'game_name' => $gameName,
			'console_name' => $consoleName,
			'new_copies' => $newCopies,
			'used_copies' => $usedCopies
		]);
	}
	private function getConsoleName(Controller $functionHouseController, String $consoleNewUsed) {
		$pos = strpos($consoleNewUsed, "-");
		return $functionHouseController->getFirst($consoleNewUsed, $pos);
	}
	private function getCopies(Controller $functionHouseController, String $consoleNewUsed, int $valueNumber) {
		$pos = strpos($consoleNewUsed, "-");
		$newUsed = $functionHouseController->getRest($consoleNewUsed, $pos);
		$pos = strpos($newUsed, "-");
		if ($valueNumber == 1)
			return $functionHouseController->getFirst($newUsed, $pos);
		else
			return $functionHouseController->getRest($newUsed, $pos);
	}

}
