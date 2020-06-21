<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\FunctionHouseController;
use Illuminate\Http\Request;
use App\MerchItem;
use App\CategoryOfMerch;
use Illuminate\Database\QueryException;

class AddMerchItemController extends Controller {
	public function __construct() {
		$this->middleware('guest');
	}

	protected function index(Request $request) {
		$request->validate([
			'nombre' => ['required', 'string'],
			'foto' => ['required', 'image'],
			'descripción' => ['required', 'string'],
			'multimedia-de-origen' => ['required', 'string'],
			'precio' => ['required', 'numeric', 'min:0'],
			'categorías' => ['required', 'string'],
		]);
		return $this->saveInDatabaseAndReturn($request);
	}

	protected function saveInDatabaseAndReturn(Request $request) {
		$functionHouseController = new FunctionHouseController;

		try { $this->saveMerchItem($functionHouseController, $request); }
		catch (QueryException $ex) { return back()->with('error', "ERROR AL ALMACENAR EL ART\U00CDCULO: Ya existe un art\U00EDculo de merchandising en la base de datos con el nombre " . $request->input('nombre') . "."); }
		
		try { $functionHouseController->handleMultipleValueInput($this, $request->input('nombre'), $request->input('categorías'), "createCategoryOfMerch"); }
		catch (QueryException $ex) { return back()->with('error', "ERROR AL ALMACENAR LAS CATEGOR\U00CDAS: La sintaxis usada en el campo correspondiente a las Categor\U00EDas no es correcta."); }
		
		return back()->with('success','¡Art\U00EDculo almacenado con ÉXITO!');
	}

	private function saveMerchItem(Controller $functionHouseController, Request $request) {
		$photoContent = $functionHouseController->getContent($request, "foto");
		MerchItem::create([
			'name' => $request->input('nombre'),
			'photo' => base64_encode($photoContent),
			'description' => $request->input('descripción'),
			'origin_media' => $request->input('multimedia-de-origen'),
			'price' => $request->input('precio')
		]);
	}

	public function createCategoryOfMerch(Controller $functionHouseController, String $category, String $merchItemName) {
		CategoryOfMerch::create([
			'merch_item_name' => $merchItemName,
			'category_name' => $category
		]);
	}
}
