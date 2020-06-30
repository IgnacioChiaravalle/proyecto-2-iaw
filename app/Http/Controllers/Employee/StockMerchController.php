<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Employee\MerchFinderController;
use Illuminate\Support\Facades\View;
use App\MerchItem;

class StockMerchController extends Controller {
	public function changeMerchStock(String $itemName, int $value) {
		$merchItem = MerchItem::where('name', $itemName)->first();		
		$finalValue = $merchItem->stock + $value;
		$merchFinderController = new MerchFinderController;
		if ($finalValue >= 0) {
			$merchItem->update([
				'stock' => $finalValue
			]);
			return back()->with('itemCategories', [$merchFinderController->getMerchInfo($merchItem)]);
		}
		else
			return back()->with('itemCategories', [$merchFinderController->getMerchInfo($merchItem)])->with('message', "ERROR AL MODIFICAR EL STOCK DEL ARTÍCULO " . $itemName . ": La cantidad final de las unidades disponibles debe ser mayor o igual a cero.");
	}
}
