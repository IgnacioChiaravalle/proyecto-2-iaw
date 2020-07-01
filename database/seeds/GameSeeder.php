<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder {
	public function run() {
		$this->insert(['Bioshock Infinite', '2013', 'M', 'Bioshock Infinite Cover.jpg', 'Bioshock Infinite Countercover.jpg', 20, 10.50]);
		$this->insert(['The Last of Us', '2013', 'M', 'The Last of Us Cover.jpg', 'The Last of Us Countercover.jpg', 18.75, 10.50]);
		$this->insert(['Portal 2', '2011', 'E+10', 'Portal 2 Cover.jpg', 'Portal 2 Countercover.jpg', 10, 5]);
		$this->insert(['Deus Ex: Human Revolution', '2011', 'M', 'Deus Ex Human Revolution Cover.jpg', 'Deus Ex Human Revolution Countercover.jpg', 9.99, 6.25]);
		$this->insert(['Dragon Age: Origins', '2009', 'M', 'Dragon Age Origins Cover.jpg', 'Dragon Age Origins Countercover.jpg', 9.99, 4.50]);
		$this->insert(['Mass Effect', '2007', 'M', 'Mass Effect Cover.jpg', null, 4.99, 2.50]);
		$this->insert(['FIFA 20', '2019', 'E', 'FIFA 20 Cover.jpg', null, 60, 45]);
		$this->insert(['Final Fantasy VII: Remake', '2020', 'T', 'Final Fantasy VII Remake Cover.jpg', 'Final Fantasy VII Remake Countercover.jpg', 60, 52.75]);
		$this->insert(['Sonic & All-Stars Racing Transformed', '2012', 'E+10', 'Sonic All-Stars Racing Transformed Cover.jpg', null, 14.99, 6.25]);

		$this->call(DeveloperSeeder::Class);
		$this->call(ConsoleSeeder::Class);
	}

	private function insert(array $data) {
		DB::table('games')->insert([
			'name' => $data[0],
			'release_year' => $data[1],
			'esrb_rating' => $data[2],
			'cover' => $data[3],
			'counter_cover' => $data[4],
			'price_new' => $data[5],
			'price_used' => $data[6]
		]);
	}

	private function getImageEncode($name) {
		$url = "app/public/Seeder Images/Game Covers/$name";
		$contents = file_get_contents($url);
		return base64_encode($contents);
	}
}
