<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'release_year', 'esrb_rating', 'cover', 'counter_cover', 'price_new', 'price_used'
	];

}
