<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\FunctionHouseController;
use App\Http\Controllers\Admin\AddMerchItemController;
use Illuminate\Http\Request;
use App\MerchItem;
use App\CategoryOfMerch;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EditMerchItemController extends Controller {
    public function __construct() {
		$this->middleware('guest');
	}

	protected function index(Request $request) {
		$request->validate([
			'nombre' => ['required', 'string'],
			'foto' => ['nullable', 'image'],
			'descripción' => ['nullable', 'string'],
			'multimedia-de-origen' => ['nullable', 'string'],
			'precio' => ['nullable', 'numeric', 'min:0'],
			'categorías' => ['nullable', 'string'],
		]);
		return $this->editInDatabaseAndReturn($request);
    }
    
    protected function editInDatabaseAndReturn(Request $request) {
		$functionHouseController = new FunctionHouseController;

		try { $this->updateMerchItem($functionHouseController, $request); }
		catch (ModelNotFoundException $ex) { return back()->with('error', "ERROR AL EDITAR EL ART\U00CDCULO: No hay un art\U00EDculo de merchandising con nombre " . $request->input('nombre') . " en la base de datos."); }
		
		if ($request->input('categorías') != null){
			CategoryOfMerch::where('merch_item_name', $request->input('nombre'))->delete();
			try { $functionHouseController->handleMultipleValueInput(new AddMerchItemController, $request->input('nombre'), $request->input('categorías'), "createCategoryOfMerch"); }
			catch (QueryException $ex) { return back()->with('error', "ERROR AL EDITAR LAS CATEGOR\U00CDAS: La sintaxis usada en el campo correspondiente a las Categor\U00EDas no es correcta."); }
		}

		return back()->with('success','¡Art\U00EDculo editado con ÉXITO!');
	}
	
	private function updateMerchItem(Controller $functionHouseController, Request $request) {
		MerchItem::where('name', $request->input('nombre'))->firstOrFail(); //Verify that the merch item is stored. 
		$requestArray = $this->getRequestArray($functionHouseController, $request, $request->input('nombre'));
		MerchItem::where('name', $request->input('nombre'))->update([
			'photo' => $requestArray[0],
			'description' => $requestArray[1],
			'origin_media' => $requestArray[2],
			'price' => $requestArray[3]
		]);
	}
	private function getRequestArray(Controller $functionHouseController, Request $request, String $merchItemName) {
		$requestArray = [];
        if ($request->file('foto') != null)
			array_push($requestArray, base64_encode($functionHouseController->getContent($request, "foto")));
		else
			array_push($requestArray, MerchItem::where('name', $merchItemName)->pluck('photo')[0]);
        array_push($requestArray, $request->input('descripción') ?? MerchItem::where('name', $merchItemName)->pluck('description')[0]);
		array_push($requestArray, $request->input('multimedia-de-origen') ?? MerchItem::where('name', $merchItemName)->pluck('origin_media')[0]);
		array_push($requestArray, $request->input('precio') ?? MerchItem::where('name', $merchItemName)->pluck('price')[0]);
		return $requestArray;
	}
}
