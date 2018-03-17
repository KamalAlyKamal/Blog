<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
	use SoftDeletes;

	// For mass assignment
	protected $fillable = [
		'title', 'featured', 'content', 'category_id', 'slug'
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
}
