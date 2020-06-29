<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Employee\MerchFinderController;
use Illuminate\Support\Facades\View;
use App\MerchItem;
use App\Game;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FullMerchDataController extends Controller {
	public function __construct() {
		$this->middleware('guest');
	}

	protected function getFullMerchData($itemName) {
		$merchItem = MerchItem::where('name', $itemName)->first();
		$mFC = new MerchFinderController;
		$categoriesArray = $mFC->getCategoriesArray($itemName);
		try {
			Game::where('name', $merchItem->origin_media)->firstOrFail(); //Check if there is a game in the database that corresponds to this merch item. If so, there should be a link that takes the user to it's website.
			return View::make('employeeuser/merch/fullmerchdata')->with('merchItem', $merchItem)->with('categories', $categoriesArray)->with('found', true);	
		}
		catch (ModelNotFoundException $ex) {
			return View::make('employeeuser/merch/fullmerchdata')->with('merchItem', $merchItem)->with('categories', $categoriesArray)->with('found', false);
		}
	}
}
