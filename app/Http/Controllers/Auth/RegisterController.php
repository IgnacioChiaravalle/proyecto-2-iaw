<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {

	use RegistersUsers;

	public function __construct() {
		$this->middleware('guest');
	}

	protected function validator(array $data) {
		return Validator::make($data, [
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
			'api_token' => ['required', 'string', 'min:8', 'max:60', 'confirmed','unique:users'],
		]);
	}

	protected function create(array $data) {
		$admin = empty($data['admin_user']) ? 0 : 1;
		$user = User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
			'admin' => $admin,
			'api_token' => $data['api_token'],
		]);
		header('Location: /login');
		exit;
	}
}
