<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryOfMerchSeeder extends Seeder {
	public function run() {
		$this->insertIntoTable(['Booker DeWitt Funko POP', 'Adornos']);
		$this->insertIntoTable(['Booker DeWitt Funko POP', 'Figuras de Acción']);
		$this->insertIntoTable(['Booker DeWitt Funko POP', 'Funko POP']);

		$this->insertIntoTable(['Elizabeth Funko POP', 'Adornos']);
		$this->insertIntoTable(['Elizabeth Funko POP', 'Figuras de Acción']);
		$this->insertIntoTable(['Elizabeth Funko POP', 'Funko POP']);

		$this->insertIntoTable(['Chapa de ATTENTION ATTENTION', 'Adornos']);
		$this->insertIntoTable(['Chapa de ATTENTION ATTENTION', 'Chapas']);
		$this->insertIntoTable(['Chapa de ATTENTION ATTENTION', 'Cuadros y Pósteres']);
		$this->insertIntoTable(['Chapa de ATTENTION ATTENTION', 'Música']);

		$this->insertIntoTable(['Collar de Linkin Park', 'Accesorios']);
		$this->insertIntoTable(['Collar de Linkin Park', 'Indumentaria']);
		$this->insertIntoTable(['Collar de Linkin Park', 'Música']);
		
		$this->insertIntoTable(['Remera de Linkin Park', 'Indumentaria']);
		$this->insertIntoTable(['Remera de Linkin Park', 'Música']);

		$this->insertIntoTable(['Mousepad de Deadpool', 'Electrónica']);
		$this->insertIntoTable(['Mousepad de Deadpool', 'Utilidades']);
	}

	private function insertIntoTable(array $data) {
		DB::table('categories_of_merch')->insert([
			'merch_item_name' => $data[0],
			'category_name' => $data[1]
		]);
	}
}
