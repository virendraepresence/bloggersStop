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
/*
Route::get('/', function () {
    return view('welcome');
});

*/

Route::group(['middleware' => ['web']], function () {


Route::resource('categories', 'CategoryController', ['except' => ['create']]);
Route::resource('tags', 'TagController', ['except' => ['create']]);

Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');


//comment
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);





Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);


//pages
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/contact', 'PagesController@contact');
Route::post('/contact', 'PagesController@postContact');
Route::get('/profile', 'PagesController@profile');
Route::get('/gallery', 'PagesController@gallery');
Route::get('/technology', 'PagesController@technology');
Route::get('/discussion', 'PagesController@discussion');
Route::get('/coding', 'PagesController@coding');



Route::resource('posts', 'PostsController');
Route::get('posts/{id}/delete', ['uses' => 'PostsController@delete', 'as' => 'posts.delete']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


});