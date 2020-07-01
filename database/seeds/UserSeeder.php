<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
	public function run() {
		$this->insertIntoTable(['Ignacio Martín Chiaravalle', 'nachochiara@gmail.com', '123456789', 0, '123456789']);
		$this->insertIntoTable(['Nacho Chiara', 'nachochiara98@hotmail.com', 'nachochiara', 1, 'nachochiara']);
		$this->insertIntoTable(['Administrador', 'admin@admin', 'admin', 1, 'admin']);
		$this->insertIntoTable(['Empleado', 'empleado@empleado', 'empleado', 0, 'empleado']);
	}

	private function insertIntoTable(array $data) {
		DB::table('users')->insert([
			'name' => $data[0],
			'email' => $data[1],
			'password' => Hash::make($data[2]),
			'admin' => $data[3],
			'api_token' => $data[4]
		]);
	}
}
