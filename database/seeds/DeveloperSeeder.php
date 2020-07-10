<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeveloperSeeder extends Seeder {
	public function run() {
		$this->insertIntoTable(['Bioshock Infinite', 'Irrational Games']);
		$this->insertIntoTable(['Bioshock Infinite', '2K']);

		$this->insertIntoTable(['The Last of Us', 'Naughty Dog']);
		
		$this->insertIntoTable(['Portal 2', 'Valve Corporation']);

		$this->insertIntoTable(['Deus Ex: Human Revolution', 'Eidos Montréal']);
		$this->insertIntoTable(['Deus Ex: Human Revolution', 'Square Enix']);

		$this->insertIntoTable(['Dragon Age: Origins', 'BioWare']);

		$this->insertIntoTable(['Mass Effect', 'BioWare']);

		$this->insertIntoTable(['FIFA 20', 'EA Sports']);

		$this->insertIntoTable(['Final Fantasy VII: Remake', 'Square Enix']);
		
		$this->insertIntoTable(['Sonic & All-Stars Racing Transformed', 'Sumo Digital']);
	}

	private function insertIntoTable(array $data) {
		DB::table('developers')->insert([
			'game_name' => $data[0],
			'dev_name' => $data[1]
		]);
	}
}
