<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccessRegisterController extends Controller {
	public function getRegisterView() {
		return view('register');
	}
}
