<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\FunctionHouseController;
use App\Http\Controllers\Admin\AddGameController;
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
		$functionHouseController = new FunctionHouseController;

		try { $this->updateGame($functionHouseController, $request); }
		catch (ModelNotFoundException $ex) { return back()->with('error', "ERROR AL EDITAR EL JUEGO: No hay un juego con nombre " . $request->input('nombre') . " en la base de datos."); }
		
		if ($request->input('desarrolladores') != null) {
			Developer::where('game_name', $request->input('nombre'))->delete();
			$functionHouseController->handleMultipleValueInput(new AddGameController, $request->input('nombre'), $request->input('desarrolladores'), "createDeveloper");
		}
		
		if ($request->input('consolas') != null){
			Console::where('game_name', $request->input('nombre'))->delete();
			try { $functionHouseController->handleMultipleValueInput(new AddGameController, $request->input('nombre'), $request->input('consolas'), "createConsole"); }
			catch (QueryException $ex) { return back()->with('error', "ERROR AL EDITARL LA DISPONIBLIDAD EN CONSOLAS: La sintaxis usada en el campo correspondiente a las Consolas no es correcta."); }
		}

		return back()->with('success','¡Juego editado con ÉXITO!');
	}
	
	private function updateGame(Controller $functionHouseController, Request $request) {
		Game::where('name', $request->input('nombre'))->firstOrFail(); //Verify that the game is stored. 
		$requestArray = $this->getRequestArray($functionHouseController, $request, $request->input('nombre'));
		Game::where('name', $request->input('nombre'))->update([
			'release_year' => $requestArray[0],
			'esrb_rating' => $requestArray[1],
			'cover' => $requestArray[2],
			'counter_cover' => $requestArray[3],
			'price_new' => $requestArray[4],
			'price_used' => $requestArray[5],
		]);
	}
	private function getRequestArray(Controller $functionHouseController, Request $request, String $gameName) {
		$requestArray = [];
		array_push($requestArray, $request->input('año') ?? Game::where('name', $gameName)->pluck('release_year')[0]);
		array_push($requestArray, $request->input('ESRB') ?? Game::where('name', $gameName)->pluck('esrb_rating')[0]);
		if ($request->file('portada') != null)
			array_push($requestArray, base64_encode($functionHouseController->getContent($request, "portada")));
		else
			array_push($requestArray, Game::where('name', $gameName)->pluck('cover')[0]);
		if ($request->file('contraportada') != null) array_push($requestArray, base64_encode($functionHouseController->getContent($request, "contraportada")));
		else
			array_push($requestArray, Game::where('name', $gameName)->pluck('counter_cover')[0]);
		array_push($requestArray, $request->input('precio-nuevo') ?? Game::where('name', $gameName)->pluck('price_new')[0]);
		array_push($requestArray, $request->input('precio-usado') ?? Game::where('name', $gameName)->pluck('price_used')[0]);
		return $requestArray;
	}
	
}
