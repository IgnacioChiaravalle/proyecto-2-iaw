<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Employee\StockMerchController;
use App\MerchItem;
use App\CategoryOfMerch;

class MerchForSaleController extends Controller {
	public function __construct() {
		$this->middleware('guest');
	}

	protected function getAllMerchItems() {
		return MerchItem::select('name', 'description', 'origin_media', 'stock', 'price')->orderBy('name', 'asc')->get();
	}
	protected function getMerchItem($merchName) {
		return MerchItem::select('name', 'description', 'origin_media', 'stock', 'price')->where('name', $merchName)->first();
	}
	protected function getMerchItemPhoto($merchName) {
		return MerchItem::select('photo')->where('name', $merchName)->first();
	}

	protected function getCategoriesList() {
		return CategoryOfMerch::select('category_name')->distinct()->orderBy('category_name', 'asc')->get();
	}
	protected function getMerchItemCategories($merchName) {
		return CategoryOfMerch::where('merch_item_name', $merchName)->orderBy('category_name', 'asc')->get();
	}

	protected function changeMerchStock(String $itemName, int $value) {
		$sMC = new StockMerchController;
		$sMC->changeMerchStock($itemName, $value);
		return $this->getMerchItem($itemName);
	}
}
