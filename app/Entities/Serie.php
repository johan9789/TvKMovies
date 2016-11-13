<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serie extends Model {

	protected $table = 'series';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function genre()
	{
		return $this->belongsTo('App\Entities\Genre');
	}

	public function country()
	{
		return $this->belongsTo('App\Entities\Country');
	}

	public function seasons()
	{
		return $this->hasMany('App\Entities\Season');
	}

}