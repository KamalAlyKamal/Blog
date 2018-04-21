<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function(){
	return App\Profile::find(1)->user;
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



//Route group for admin routes
//prefix -> prefixes these routes links with admin
//use auth middleware on these routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/post/create', [
		'uses' => 'PostsController@create',
		'as' => 'post.create'
	]);

	Route::post('/post/store', [
		'uses' => 'PostsController@store',
		'as' => 'post.store'
	]);

	Route::get('/posts', [
		'uses' => 'PostsController@index',
		'as' => 'posts'
	]);

	Route::get('/post/delete/{id}', [
		'uses' => 'PostsController@destroy',
		'as' => 'post.delete'
	]);

	Route::get('/posts/trashed', [
		'uses' => 'PostsController@trashed',
		'as' => 'posts.trashed'
	]);

	Route::get('/posts/kill/{id}', [
		'uses' => 'PostsController@kill',
		'as' => 'post.kill'
	]);

	Route::get('/posts/edit/{id}', [
		'uses' => 'PostsController@edit',
		'as' => 'post.edit'
	]);

	Route::post('/posts/update/{id}', [
		'uses' => 'PostsController@update',
		'as' => 'post.update'
	]);

	Route::get('/posts/restore/{id}', [
		'uses' => 'PostsController@restore',
		'as' => 'post.restore'
	]);

	Route::get('/categories', [
		'uses' => 'CategoriesController@index',
		'as' => 'categories'
	]);


	Route::get('/category/create', [
		'uses' => 'CategoriesController@create',
		'as' => 'category.create'
	]);

	Route::post('/category/store', [
		'uses' => 'CategoriesController@store',
		'as' => 'category.store'
	]);

	Route::get('/category/edit/{id}', [
		'uses' => 'CategoriesController@edit',
		'as' => 'category.edit'
	]);

	Route::get('/category/delete/{id}', [
		'uses' => 'CategoriesController@destroy',
		'as' => 'category.delete'
	]);

	Route::post('/category/update/{id}', [
		'uses' => 'CategoriesController@update',
		'as' => 'category.update'
	]);

	Route::get('/tags' ,[
		'uses' => 'TagsController@index',
		'as' => 'tags'
	]);

	Route::get('/tag/create' ,[
		'uses' => 'TagsController@create',
		'as' => 'tag.create'
	]);

	Route::post('/tag/store' ,[
		'uses' => 'TagsController@store',
		'as' => 'tag.store'
	]);

	Route::get('/tag/edit/{id}' ,[
		'uses' => 'TagsController@edit',
		'as' => 'tag.edit'
	]);


	Route::post('/tag/update/{id}' ,[
		'uses' => 'TagsController@update',
		'as' => 'tag.update'
	]);


	Route::get('/tag/delete/{id}' ,[
		'uses' => 'TagsController@destroy',
		'as' => 'tag.delete'
	]);

	Route::get('/users', [
		'uses' => 'UsersController@index',
		'as' => 'users'
	]);

	Route::get('/user/create',[
		'uses' => 'UsersController@create',
		'as' => 'user.create'
	]);

	Route::post('/user/store',[
		'uses' => 'UsersController@store',
		'as' => 'user.store'
	]);

	Route::get('/user/admin/{id}',[
		'uses' => 'UsersController@admin',
		'as' => 'user.admin'
	]);

	Route::get('/user/remove-admin/{id}',[
		'uses' => 'UsersController@remove_admin',
		'as' => 'user.remove.admin'
	]);

	Route::get('user/profile',[
		'uses' => 'ProfilesController@index',
		'as' => 'user.profile'
	]);

	Route::post('user/profile/update',[
		'uses' => 'ProfilesController@update',
		'as' => 'user.profile.update'
	]);
});

