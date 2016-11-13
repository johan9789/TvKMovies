<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model {

	protected $table = 'genres';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function movies()
	{
		return $this->hasMany('App\Entities\Movie');
	}

	public function series()
	{
		return $this->hasMany('App\Entities\Serie');
	}

}