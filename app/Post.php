<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
	use SoftDeletes;

	// For mass assignment
	protected $fillable = [
		'title', 'featured', 'content', 'category_id', 'slug', 'user_id'
	];


	//Acessors to change the data coming from DB , naming convention is get"tablename"Attribute
	public function getFeaturedAttribute($featured)
	{
		//return full path to the image
		return asset($featured);
	}


	// new timestamp
	protected $dates = ['deleted_at'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
