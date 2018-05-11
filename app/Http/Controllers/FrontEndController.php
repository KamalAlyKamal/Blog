<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;
class FrontEndController extends Controller
{
   public function index()
   {
   		return view('index')->with('title', Setting::first()->site_name)
   							->with('categories', Category::take(5)->get())
   							->with('last_post', Post::orderBy('created_at', 'desc')->first())
   							->with('second_last_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
   							->with('third_last_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
   		/*TO BE CHANGED*/	->with('career', Category::find(8))
   		/*TO BE CHANGED*/	->with('tutorials', Category::find(7))
   							->with('settings', Setting::first());
   }

   public function singlePost($slug)
   {
      $post = Post::where('slug', $slug)->first();

      $next_id = Post::where('id', '>', $post->id)->min('id');
      $previous_id = Post::where('id', '<', $post->id)->max('id');

      return view('single')->with('post', $post)
                           ->with('title', $post->title)
                           ->with('settings', Setting::first())
                           ->with('categories', Category::take(5)->get())
                           ->with('next', Post::find($next_id))
                           ->with('previous', Post::find($previous_id))
                           ->with('tags', Tag::all());
   }
}
