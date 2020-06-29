<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryOfMerch extends Model {
	protected $table = 'categories_of_merch';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'merch_item_name', 'category_name'
	];
}
