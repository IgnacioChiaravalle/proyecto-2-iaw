<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerchItem extends Model {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'photo', 'description', 'origin_media', 'stock', 'price'
	];

}
