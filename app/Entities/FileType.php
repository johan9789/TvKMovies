<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileType extends Model {

	protected $table = 'file_types';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function movies()
	{
		return $this->hasMany('App\Entities\Movie');
	}

	public function serie_chapters()
	{
		return $this->hasMany('App\Entities\SerieChapter');
	}

}