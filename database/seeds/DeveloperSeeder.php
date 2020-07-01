<?php

use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder {
	public function run() {
		$this->insert(['Bioshock Infinite', 'Irrational Games']);
		$this->insert(['Bioshock Infinite', '2K']);
		$this->insert(['The Last of Us', 'Naughty Dog']);
		$this->insert(['Portal 2', 'Valve Corporation']);
		$this->insert(['Deus Ex: Human Revolution', 'Eidos Montréal']);
		$this->insert(['Deus Ex: Human Revolution', 'Square Enix']);
		$this->insert(['Dragon Age: Origins', 'BioWare']);
		$this->insert(['Mass Effect', 'BioWare']);
		$this->insert(['FIFA 20', 'EA Sports']);
		$this->insert(['Final Fantasy VII: Remake', 'Square Enix']);
		$this->insert(['Sonic & All-Stars Racing Transformed', 'Sumo Digital']);
	}

	private function insert(array $data) {
		DB::table('developers')->insert([
			'game_name' => $data[0],
			'dev_name' => $data[1]
		]);
	}
}
