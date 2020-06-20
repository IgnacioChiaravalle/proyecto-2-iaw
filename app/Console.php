<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Console extends Model {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'game_name', 'console_name', 'new_copies', 'used_copies'
	];
}
