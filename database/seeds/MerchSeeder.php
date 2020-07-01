<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class MerchSeeder extends Seeder {
	public function run() {
		$this->insertIntoTable([
			'Booker DeWitt Funko POP',
			$this->getImageEncode('Booker DeWitt Funko POP.jpg'),
			'Funko POP de Booker DeWitt sosteniendo el Sky-Hook.',
			'Bioshock Infinite',
			40,
			9.99
		]);
		$this->insertIntoTable([
			'Elizabeth Funko POP',
			$this->getImageEncode('Elizabeth Funko POP.jpg'),
			'Funko POP de Elizabeth sosteniendo una Infusión.',
			'Bioshock Infinite',
			35,
			9.99
		]);
		$this->insertIntoTable([
			'Chapa de ATTENTION ATTENTION',
			$this->getImageEncode('Chapa de ATTENTION ATTENTION.jpg'),
			'Chapa amarilla con marcas de óxido, con el logo de ATTENTION ATTENTION.',
			'Shinedown',
			10,
			19.99
		]);
		$this->insertIntoTable([
			'Collar de Linkin Park',
			$this->getImageEncode('Collar de Linkin Park.jpg'),
			'Collar con dos dijes con los dos logos más importantes de Linkin Park.',
			'Linkin Park',
			15,
			25
		]);
		$this->insertIntoTable([
			'Remera de Linkin Park',
			$this->getImageEncode('Remera de Linkin Park.jpg'),
			'Remera de manga corta negra con el logo de Linkin Park.',
			'Linkin Park',
			36,
			29.99
		]);
		$this->insertIntoTable([
			'Mousepad de Deadpool',
			$this->getImageEncode('Mousepad de Deadpool.jpg'),
			'Mousepad redondo con el logo de Deadpool.',
			'Deadpool',
			55,
			4.55
		]);
		
		$this->call(CategoryOfMerchSeeder::Class);
	}

	private function insertIntoTable(array $data) {
		DB::table('merch_items')->insert([
			'name' => $data[0],
			'photo' => $data[1],
			'description' => $data[2],
			'origin_media' => $data[3],
			'stock' => $data[4],
			'price' => $data[5]
		]);
	}

	private function getImageEncode($fileName) {
		$url = "Seeder Images/Merch Photos/$fileName";
		$contents = file_get_contents($url);
		return base64_encode($contents);
	}
}
