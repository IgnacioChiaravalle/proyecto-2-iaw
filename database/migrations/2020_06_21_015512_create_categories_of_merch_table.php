<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesOfMerchTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_of_merch', function (Blueprint $table) {
            $table->id();
            $table->string('merch_item_name');
			$table->foreign('merch_item_name')->references('name')->on('merch_items')->onDelete('cascade')->onUpdate('cascade');
			$table->string('category_name');
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
        Schema::dropIfExists('categories_of_merch');
    }
}
