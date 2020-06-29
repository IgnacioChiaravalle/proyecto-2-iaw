<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Employee\MerchFinderController;
use Illuminate\Support\Facades\View;
use App\MerchItem;
use App\CategoryOfMerch;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MerchFilterController extends Controller {
	public function __construct() {
		$this->middleware('guest');
	}

	protected function filterByOriginMedia($originMedia) {
		return $this->filterByMerchAttribute('origin_media', $originMedia);
	}
	protected function filterByPrice($priceInteger, $priceDecimal) {
		return $this->filterByMerchAttribute('price', $priceInteger + ($priceDecimal / 100));
	}
	protected function filterByCategory($categoryName) {
		$categories = CategoryOfMerch::where('category_name', $categoryName)->get();
		return $this->findMerchOfFilter($categories, "merch_item_name");
	}

	private function filterByMerchAttribute($modelAttribute, $parameterAttribute) {
		$merchItems = MerchItem::where($modelAttribute, $parameterAttribute)->get();
		return $this->findMerchOfFilter($merchItems, "name");
	}

	private function findMerchOfFilter($filterModel, $nameString) {
		$itemsOfFilterModel = [];
		foreach ($filterModel as $filterModelRow)
			array_push($itemsOfFilterModel, MerchItem::where('name', $filterModelRow->$nameString)->first());
		$itemCategories = [];
		$mFC = new MerchFinderController;
		foreach($itemsOfFilterModel as $item)
			array_push($itemCategories, $mFC->getMerchInfo($item));
		return View::make('employeeuser/merch/stockmerch')->with('itemCategories', $itemCategories);
	}
}
