<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = ['tag', 'slug'];
    public function posts()
    {
    	return $this->belongsToMany('App\Post');
    }
}
