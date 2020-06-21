<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('developers', function (Blueprint $table) {
			$table->id();
			$table->string('game_name');
			$table->foreign('game_name')->references('name')->on('games')->onDelete('cascade')->onUpdate('cascade');
			$table->string('dev_name');
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
		Schema::dropIfExists('developers');
	}
}
