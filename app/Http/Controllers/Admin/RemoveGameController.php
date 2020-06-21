<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Game;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RemoveGameController extends Controller{
	public function __construct() {
		$this->middleware('guest');
	}

	protected function index(Request $request) {
		$request->validate([
			'nombre' => ['required', 'string']
		]);
		return $this->deleteInDatabaseAndReturn($request);
	}
	
	protected function deleteInDatabaseAndReturn(Request $request) {
		try { $this->deleteGame($request); }
		catch (ModelNotFoundException $ex) { return back()->with('error', "ERROR AL REMOVER EL JUEGO: No hay un juego con nombre " . $request->input('nombre') . " en la base de datos."); }
		return back()->with('success','¡Juego removido con ÉXITO!');
	}
	private function deleteGame(Request $request) {
		GAME::where('name', $request->input('nombre'))->firstOrFail(); //Verify that the game is stored. 
		GAME::where('name', $request->input('nombre'))->delete();
	}
}