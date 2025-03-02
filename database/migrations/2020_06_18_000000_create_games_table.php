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
			$table->string('esrb_rating')->nullable();
			$table->text('cover');
			$table->text('counter_cover')->nullable();
			$table->float('price_new');
			$table->float('price_used');
			$table->timestamps();
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