<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Season extends Model {

	protected $table = 'seasons';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function serie()
	{
		return $this->belongsTo('App\Entities\Serie');
	}

	public function serie_chapters()
	{
		return $this->hasMany('App\Entities\SerieChapter');
	}

}