<?php

use Illuminate\Database\Seeder;

class ConsoleSeeder extends Seeder {
	public function run() {
		$this->insert(['Bioshock Infinite', 'PS3', 60, 30]);
		$this->insert(['Bioshock Infinite', 'PS4', 10, 22]);
		$this->insert(['Bioshock Infinite', 'PC', 45, 96]);
		$this->insert(['Bioshock Infinite', 'Xbox 360', 20, 55]);
		$this->insert(['Bioshock Infinite', 'Xbox One', 36, 12]);
		
		$this->insert(['The Last of Us', 'PS3', 63, 13]);
		$this->insert(['The Last of Us', 'PS4', 33, 15]);

		$this->insert(['Portal 2', 'PS3', 5, 4]);
		$this->insert(['Portal 2', 'PC', 31, 12]);
		$this->insert(['Portal 2', 'Xbox 360', 3, 10]);
		
		$this->insert(['Deus Ex: Human Revolution', 'PS3', 26, 20]);
		$this->insert(['Deus Ex: Human Revolution', 'PC', 18, 36]);
		$this->insert(['Deus Ex: Human Revolution', 'Xbox 360', 19, 40]);

		$this->insert(['Dragon Age: Origins', 'PS3', 60, 70]);
		$this->insert(['Dragon Age: Origins', 'PC', 30, 55]);
		$this->insert(['Dragon Age: Origins', 'Xbox 360', 45, 43]);

		$this->insert(['Mass Effect', 'PS3', 12, 2]);
		$this->insert(['Mass Effect', 'PC', 8, 6]);
		$this->insert(['Mass Effect', 'Xbox 360', 7, 13]);
		
		$this->insert(['FIFA 20', 'PS4', 120, 35]);
		$this->insert(['FIFA 20', 'PC', 68, 9]);
		$this->insert(['FIFA 20', 'Xbox One', 78, 12]);
		$this->insert(['FIFA 20', 'Nintendo Switch', 60, 2]);
		
		$this->insert(['Final Fantasy VII: Remake', 'PS4', 155, 1]);

		$this->insert(['Sonic & All-Stars Racing Transformed', 'PS3', 120, 35]);
		$this->insert(['Sonic & All-Stars Racing Transformed', 'PS Vita', 120, 35]);
		$this->insert(['Sonic & All-Stars Racing Transformed', 'PC', 68, 9]);
		$this->insert(['Sonic & All-Stars Racing Transformed', 'Xbox 360', 78, 12]);
		$this->insert(['Sonic & All-Stars Racing Transformed', 'Wii U', 60, 2]);
		$this->insert(['Sonic & All-Stars Racing Transformed', 'Nintendo 3DS', 60, 2]);
	}

	private function insert(array $data) {
		DB::table('consoles')->insert([
			'game_name' => $data[0],
			'console_name' => $data[1],
			'new_copies' => $data[2],
			'used_copies' => $data[3]
		]);
	}
}
