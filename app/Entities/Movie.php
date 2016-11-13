<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model {

	protected $table = 'movies';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function file_type()
	{
		return $this->belongsTo('App\Entities\FileType');
	}

	public function genre()
	{
		return $this->belongsTo('App\Entities\Genre');
	}

	public function country()
	{
		return $this->belongsTo('App\Entities\Country');
	}

}