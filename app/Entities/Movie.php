<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model {
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $appends = ['status', 'release_year'];

	public function file_type(){
		return $this->belongsTo('App\Entities\FileType');
	}

	public function genre(){
		return $this->belongsTo('App\Entities\Genre');
	}

	public function country(){
		return $this->belongsTo('App\Entities\Country');
	}

	public function getStatusAttribute(){
        return $this->downloaded ? ($this->seen ? '✔' : '✘') : ($this->seen ? '👁' : 'SOON');
    }

    public function getReleaseYearAttribute(){
        return date('Y', strtotime($this->release_date));
    }
    
    public function scopeDownloaded(){
        return $this->where('downloaded', true)->orderBy('release_date', 'desc');
    }

    public function scopePending(){
        return $this->where('downloaded', true)->where('seen', false);
    }
    
    public function scopeTopRated(){
        return $this->orderBy('rating', 'desc')->orderBy('release_date', 'desc');
    }

    public function scopeNextReleases(){
        return $this->where('release_date', '>=', date('Y-m-d'))->orderBy('release_date');
    }

    public function scopeSoon(){
        return $this->where('release_date', '<', date('Y-m-d'))->where('downloaded', false);
    }

    public function scopeFuture(){
        return $this->where('release_date', '>', date('Y-m-d'))->where('downloaded', false);
    }

    public function scopeLast(){
        return $this->where('release_date', '<=', date('Y-m-d'))->orderBy('release_date', 'desc');
    }

}
