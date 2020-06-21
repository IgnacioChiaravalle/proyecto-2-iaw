<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsolesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('consoles', function (Blueprint $table) {
			$table->id();
			$table->string('game_name');
			$table->foreign('game_name')->references('name')->on('games')->onDelete('cascade')->onUpdate('cascade');
			$table->string('console_name');
			$table->smallInteger('new_copies');
			$table->smallInteger('used_copies');
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
		Schema::dropIfExists('consoles');
	}
}
