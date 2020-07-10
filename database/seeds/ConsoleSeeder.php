<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsoleSeeder extends Seeder {
	public function run() {
		$this->insertIntoTable(['Bioshock Infinite', 'PS3', 60, 30]);
		$this->insertIntoTable(['Bioshock Infinite', 'PS4', 10, 22]);
		$this->insertIntoTable(['Bioshock Infinite', 'PC', 45, 96]);
		$this->insertIntoTable(['Bioshock Infinite', 'Xbox 360', 20, 55]);
		$this->insertIntoTable(['Bioshock Infinite', 'Xbox One', 36, 12]);
		
		$this->insertIntoTable(['The Last of Us', 'PS3', 63, 13]);
		$this->insertIntoTable(['The Last of Us', 'PS4', 33, 15]);

		$this->insertIntoTable(['Portal 2', 'PS3', 5, 4]);
		$this->insertIntoTable(['Portal 2', 'PC', 31, 12]);
		$this->insertIntoTable(['Portal 2', 'Xbox 360', 3, 10]);
		
		$this->insertIntoTable(['Deus Ex: Human Revolution', 'PS3', 26, 20]);
		$this->insertIntoTable(['Deus Ex: Human Revolution', 'PC', 18, 36]);
		$this->insertIntoTable(['Deus Ex: Human Revolution', 'Xbox 360', 19, 40]);

		$this->insertIntoTable(['Dragon Age: Origins', 'PS3', 60, 70]);
		$this->insertIntoTable(['Dragon Age: Origins', 'PC', 30, 55]);
		$this->insertIntoTable(['Dragon Age: Origins', 'Xbox 360', 45, 43]);

		$this->insertIntoTable(['Mass Effect', 'PS3', 12, 2]);
		$this->insertIntoTable(['Mass Effect', 'PC', 8, 6]);
		$this->insertIntoTable(['Mass Effect', 'Xbox 360', 7, 13]);
		
		$this->insertIntoTable(['FIFA 20', 'PS4', 120, 35]);
		$this->insertIntoTable(['FIFA 20', 'PC', 68, 9]);
		$this->insertIntoTable(['FIFA 20', 'Xbox One', 78, 12]);
		$this->insertIntoTable(['FIFA 20', 'Nintendo Switch', 60, 2]);
		
		$this->insertIntoTable(['Final Fantasy VII: Remake', 'PS4', 155, 1]);

		$this->insertIntoTable(['Sonic & All-Stars Racing Transformed', 'PS3', 120, 35]);
		$this->insertIntoTable(['Sonic & All-Stars Racing Transformed', 'PS Vita', 120, 35]);
		$this->insertIntoTable(['Sonic & All-Stars Racing Transformed', 'PC', 68, 9]);
		$this->insertIntoTable(['Sonic & All-Stars Racing Transformed', 'Xbox 360', 78, 12]);
		$this->insertIntoTable(['Sonic & All-Stars Racing Transformed', 'Wii U', 60, 2]);
		$this->insertIntoTable(['Sonic & All-Stars Racing Transformed', 'Nintendo 3DS', 60, 2]);
	}

	private function insertIntoTable(array $data) {
		DB::table('consoles')->insert([
			'game_name' => $data[0],
			'console_name' => $data[1],
			'new_copies' => $data[2],
			'used_copies' => $data[3]
		]);
	}
}
