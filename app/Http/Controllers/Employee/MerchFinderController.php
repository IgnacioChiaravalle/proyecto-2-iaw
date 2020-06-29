<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\MerchItem;
use App\CategoryOfMerch;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MerchFinderController extends Controller {
	public function __construct() {
		$this->middleware('guest');
	}

	protected function getAllMerch() {
		$merchItems = MerchItem::orderBy('name', 'asc')->get();
		$itemCategories = [];
		foreach($merchItems as $merchItem)
			array_push($itemCategories, $this->getMerchInfo($merchItem));
		if (count($itemCategories) > 0)
			return View::make('employeeuser/merch/stockmerch')->with('itemCategories', $itemCategories);
		else
			return View::make('employeeuser/merch/stockmerch');
	}

	protected function getMerchItem(Request $request) {
		$request->validate(['nombre' => ['required', 'string']]);
		try {			
			$merchItem = MerchItem::where('name', $request->input('nombre'))->firstOrFail();
			return View::make('employeeuser/merch/stockmerch')->with('itemCategories', [$this->getMerchInfo($merchItem)]);
		}
		catch (ModelNotFoundException $ex) {
			return back()->with('message', "ERROR AL RECUPERAR EL ARTÍCULO DE LA BASE DE DATOS: No hay un artículo de merchandising con nombre " . $request->input('nombre') . " en la base de datos.");
		}
	}

	public function getMerchInfo(MerchItem $merchItem) {
		$merchItemData = [
			$merchItem->name,
			$merchItem->description,
			$merchItem->origin_media,
			$merchItem->stock,
			$merchItem->price
		];
		$categoriesArray = $this->getCategoriesArray($merchItemData[0]);
		return [$merchItemData, $categoriesArray];
	}

	public function getCategoriesArray(String $merchItemName) {
		$categories = CategoryOfMerch::where('merch_item_name', $merchItemName)->orderBy('category_name', 'asc')->get();
		$categoriesArray = [];
		foreach ($categories as $category)
			array_push($categoriesArray, $category->category_name);
		return $categoriesArray;
	}
}
