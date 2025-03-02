<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder {

	public function run() {
		$this->truncateTables([
			'users',
			'password_resets',
			'games',
			'developers',
			'consoles',
			'merch_items',
			'categories_of_merch'
		]);

		$this->call(UserSeeder::Class);
		$this->call(GameSeeder::Class);
		$this->call(MerchSeeder::Class);
	}

	private function truncateTables(array $tables) {
		foreach ($tables as $table)
			DB::table($table)->truncate();
	}

}