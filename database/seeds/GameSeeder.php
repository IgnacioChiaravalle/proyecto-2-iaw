<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class GameSeeder extends Seeder {
	public function run() {
		$this->insertIntoTable(['Bioshock Infinite', '2013', 'M', $this->getImageEncode('Bioshock Infinite Cover.jpg'), $this->getImageEncode('Bioshock Infinite Countercover.jpg'), 20, 10.50]);
		$this->insertIntoTable(['The Last of Us', '2013', 'M', $this->getImageEncode('The Last of Us Cover.jpg'), $this->getImageEncode('The Last of Us Countercover.jpg'), 18.75, 10.50]);
		$this->insertIntoTable(['Portal 2', '2011', 'E+10', $this->getImageEncode('Portal 2 Cover.jpg'), $this->getImageEncode('Portal 2 Countercover.jpg'), 10, 5]);
		$this->insertIntoTable(['Deus Ex: Human Revolution', '2011', 'M', $this->getImageEncode('Deus Ex Human Revolution Cover.jpg'), $this->getImageEncode('Deus Ex Human Revolution Countercover.jpg'), 9.99, 6.25]);
		$this->insertIntoTable(['Dragon Age: Origins', '2009', 'M', $this->getImageEncode('Dragon Age Origins Cover.jpg'), $this->getImageEncode('Dragon Age Origins Countercover.jpg'), 9.99, 4.50]);
		$this->insertIntoTable(['Mass Effect', '2007', 'M', $this->getImageEncode('Mass Effect Cover.jpg'), null, 4.99, 2.50]);
		$this->insertIntoTable(['FIFA 20', '2019', 'E', $this->getImageEncode('FIFA 20 Cover.jpg'), null, 60, 45]);
		$this->insertIntoTable(['Final Fantasy VII: Remake', '2020', 'T', $this->getImageEncode('Final Fantasy VII Remake Cover.jpg'), $this->getImageEncode('Final Fantasy VII Remake Countercover.jpg'), 60, 52.75]);
		$this->insertIntoTable(['Sonic & All-Stars Racing Transformed', '2012', 'E+10', $this->getImageEncode('Sonic All-Stars Racing Transformed Cover.jpg'), null, 14.99, 6.25]);

		$this->call(DeveloperSeeder::Class);
		$this->call(ConsoleSeeder::Class);
	}

	private function insertIntoTable(array $data) {
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

	private function getImageEncode($fileName) {
		$url = "Seeder Images/Game Covers/$fileName";
		$contents = file_get_contents($url);
		return base64_encode($contents);
	}
}
