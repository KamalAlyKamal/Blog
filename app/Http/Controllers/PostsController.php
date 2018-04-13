<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if($categories->count() == 0)
        {
            Session::flash('info', 'You must have some categories before creating a post.');

            return redirect()->back();
        }

        return view('admin.posts.create')->with('categories', $categories)->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        $featured = $request->featured;

        // TO prevent duplicate images with same name in DB

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/'.$featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title) //This function to generate a slug from a string ex: create a 5.6 project -> create-a-56-project
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post created successfully');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.posts.edit')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        //Check if user uploaded image to edit it or not.
        if($request->hasFile('featured'))
        {
            $featured = $request->featured;

            // TO prevent duplicate images with same name in DB

            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/'.$featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        //Deletes all tags associated then attaches new tags
        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post updated successfully.');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //SOFT DELETE
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'Post trashed successfully');

        return redirect()->back();
    }

    //Returns a view with trashed (Soft deleted) posts
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts', $posts);
    }

    //Permenantly deletes posts that were soft deleted.
    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        
        $post->forceDelete();

        Session::flash('success', 'Post deleted permenantly.');

        return redirect()->back();
    }

    //Restores a trashed post.
    public function restore($id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->first();

        $post->restore();

        Session::flash('success', 'Post restored successfully.');

        return redirect()->route('posts');
    }
}
