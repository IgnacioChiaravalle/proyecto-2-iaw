<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FunctionHouseController extends Controller {
	public function __construct() {
		$this->middleware('guest');
	}
	
	public function getContent(Request $request, String $input) {
		$inputValue = $request->file($input);
		return $inputValue->openfile()->fread($inputValue->getSize());
	}
	
	public function handleMultipleValueInput(Controller $controller, String $foreignKeyName, String $allItems, $createFunction) {
		$pos = strpos($allItems, ";");
		while ($pos != false) {
			$oneItem = $this->getFirst($allItems, $pos);
			$controller->$createFunction($this, $oneItem, $foreignKeyName);
			$allItems = $this->getRest($allItems, $pos);
			$pos = strpos($allItems, ";");
		}
		if (strlen($allItems) >= 1) { //Check if the input ended with ';' or not.
			$allItems = $this->removeSpaceAt($allItems, strlen($allItems)-1, 0, strlen($allItems)-1);
			$controller->$createFunction($this, $allItems, $foreignKeyName);
		}
	}

	public function getFirst(String $all, int $posOfDelimiter) {
		$first = substr($all, 0, $posOfDelimiter);
		$first = $this->removeSpaceAt($first, $posOfDelimiter-1, 0, $posOfDelimiter-1);
		return $first;
	}
	public function getRest(String $all, int $posOfDelimiter) {
		$rest = substr($all, $posOfDelimiter + 1);
		$rest = $this->removeSpaceAt($rest, 0, 1, strlen($rest)-1);
		return $rest;
	}
	public function removeSpaceAt(String $string, int $index, int $newStart, $newLength) {
		if (substr($string, $index, 1) == " ")
			$string = substr($string, $newStart, $newLength);
		return $string;
	}
	
}
