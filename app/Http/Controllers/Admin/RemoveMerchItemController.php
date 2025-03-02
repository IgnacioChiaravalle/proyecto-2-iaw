<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MerchItem;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RemoveMerchItemController extends Controller {
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
		try { $this->deleteMerchItem($request); }
		catch (ModelNotFoundException $ex) { return back()->with('message', "ERROR AL REMOVER EL ARTÍCULO: No hay un artículo de merchandising con nombre " . $request->input('nombre') . " en la base de datos."); }
		return back()->with('message','¡Artículo removido con ÉXITO!');
	}
	private function deleteMerchItem(Request $request) {
		MerchItem::where('name', $request->input('nombre'))->firstOrFail(); //Verify that the merch item is stored. 
		MerchItem::where('name', $request->input('nombre'))->delete();
	}
}
