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
			'stock' => ['required', 'integer', 'min:0'],
			'precio' => ['required', 'numeric', 'min:0'],
			'categorías' => ['required', 'string'],
		]);
		return $this->saveInDatabaseAndReturn($request);
	}

	protected function saveInDatabaseAndReturn(Request $request) {
		$functionHouseController = new FunctionHouseController;
		try { $this->saveMerchItem($functionHouseController, $request); }
		catch (QueryException $ex) { return back()->with('message', "ERROR AL ALMACENAR EL ARTÍCULO: Ya existe un artículo de merchandising en la base de datos con el nombre " . $request->input('nombre') . "."); }
		$functionHouseController->handleMultipleValueInput($this, $request->input('nombre'), $request->input('categorías'), "createCategoryOfMerch");
		return back()->with('message','¡Artículo almacenado con ÉXITO!');
	}

	private function saveMerchItem(Controller $functionHouseController, Request $request) {
		$photoContent = $functionHouseController->getContent($request, "foto");
		MerchItem::create([
			'name' => $request->input('nombre'),
			'photo' => base64_encode($photoContent),
			'description' => $request->input('descripción'),
			'origin_media' => $request->input('multimedia-de-origen'),
			'stock' => $request->input('stock'),
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
