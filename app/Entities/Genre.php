<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model {
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

	public function movies(){
		return $this->hasMany('App\Entities\Movie');
	}

	public function series(){
		return $this->hasMany('App\Entities\Serie');
	}

}