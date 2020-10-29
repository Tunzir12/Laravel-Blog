<?php

use Illuminate\Support\Facades\Route;

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



   Route::group(['middleware' => ['web']], function () {
   //authentication routes
   Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

   //password resets routes
   Route::get('/reset', '\App\Http\Controllers\Auth\ResetPasswordController@reset');

   Route::resource('categories','\App\Http\Controllers\CategoryController',['except' => ['create']]);
   
   Route::resource('tags','\App\Http\Controllers\TagController',['except' => ['create']]);
   
   
   Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])-> where('slug','[\w\d\-\_]+');
// any word charcter = \w
// any number charcter = \d
// underscore charcter = \_
// dash charcter = \-
//[\w\d\-\_]+ anything outside these charzcters will be rejected.

   Route::get('blog',['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);

   Route::get('/', 'PagesController@getIndex');

   Route::get('/about', 'PagesController@getAbout');

   Route::post('comments/{post_id}',['uses'=> 'CommentController@store', 'as' => 'comments.store']);
   
  // Route::get('/blog', 'PagesController@getBrowse');

   Route::get('/contact', 'PagesController@getContact');
   Route::post('/contact', 'PagesController@postContact');
   
   Route::resource('/posts', 'PostController');
   
   Route::get('ID/{id}',function($id) {
      echo 'ID: '.$id;
   });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
