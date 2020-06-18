<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('games', function (Blueprint $table) {
			$table->id();
			$table->string('name')->unique();
			$table->smallInteger('release_year');
			$table->char('esrb_rating')->nullable();
			$table->text('cover');
			$table->text('counter_cover')->nullable();
			$table->smallInteger('price_new');
			$table->smallInteger('price_used');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('games');
	}
}