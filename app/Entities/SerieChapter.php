<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SerieChapter extends Model {

	protected $table = 'serie_chapters';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function file_type()
	{
		return $this->belongsTo('App\Entities\FileType');
	}

	public function season()
	{
		return $this->belongsTo('App\Entities\Season');
	}

}