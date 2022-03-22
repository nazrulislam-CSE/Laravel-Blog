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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/test',   function(){ 
	return App\Models\User::find(1)->get();
 });*/

 /*Route::get('/test/', function(){
	return App\Models\User::find(1)->profile;
});*/

Route::get('/test',function(){
    return App\Models\Posts::find(13)->user;
});

// dynamic project section start //
Route::get('/','FrontEndController@index')->name('index');
Route::get('/posts/{slug}','FrontEndController@singlePost')->name('post.single');
Route::get('/categorys/{id}','FrontEndController@category')->name('category.single');
Route::get('/tag/{id}','FrontEndController@tag')->name('tag.single');
Route::get('/result/','FrontEndController@search')->name('search');
// dynamic project section end //





Route::group(['middleware'=> ['auth:sanctum','verified']] ,function(){
// satrt dashboard section //
Route::get('/dashboard','DashboardController@index')->name('dashboard');
// start category section //
Route::get('/category/create_category','CategoryController@create')->name('create.category');
Route::post('/categories','CategoryController@store')->name('category.store');
Route::get('/category/all_category','CategoryController@index')->name('all.cate');
Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit');
Route::post('/category/update/{id}','CategoryController@update')->name('category.update');
Route::get('/category/all_category/{id}','CategoryController@destroy')->name('delete');
// post section //
Route::get('/post/create_post','PostsController@create')->name('create.post');
Route::post('/post/create_post','PostsController@store')->name('post.store');
Route::get('/post/all_post','PostsController@index')->name('all.post');
Route::get('/post/all_post/{id}','PostsController@destroy')->name('post.delete');
Route::get('/post/trashed/', 'PostsController@trashed')->name('post.trashed');
Route::get('/post/restore/{id}','PostsController@restore')->name('post.restore');
Route::get('/post/kill/{id}', 'PostsController@kill')->name('post.kill');
Route::get('/post/edit/{id}','PostsController@edit')->name('post.edit');
Route::post('/post/update/{id}','PostsController@update')->name('post.update');
// start tag section //
Route::get('/tags/create_tag','TagController@create')->name('create.tags');
Route::post('/tags/create_tag','TagController@store')->name('tags.store');
Route::get('/tags/all_tag','TagController@index')->name('all.tags');
Route::get('/tags/edit_tag/{id}','TagController@edit')->name('eidt.tags');
Route::post('/tags/update/{id}','TagController@update')->name('tags.update');
Route::get('/tags/delete/{id}','TagController@destroy')->name('delete.tags');
// start user section //
Route::get('/user/create_user','UsersController@create')->name('create.user');
Route::get('/user/all_user','UsersController@index')->name('all.user');
Route::post('/user/create_user','UsersController@store')->name('user.store');
Route::get('/user/admin/{id}','UsersController@admin')->name('user.admin');
Route::get('/user/user/not_admin/{id}','UsersController@not_admin')->name('user.not_admin');
// start setting section //
Route::get('/settings/all_settings','SettingsController@index')->name('all.settings');
Route::get('/settings/edit_settings/{id}','SettingsController@edit')->name('edit.settings');
Route::post('/settings/edit_settings/{id}','SettingsController@update')->name('update.settings');

});
