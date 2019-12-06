<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Post;
use App\Role;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');



Route::get('/admin',function(){

    return view('admin.index');

})->name('admin')->middleware('admin');


//Route::get('/createpost',function (){
//
//    $post=new Post;
//    $post->title='My Title';
//    $post->body="check this out man i create my first post";
//    $post->save();
//});


//Route::get('role',function(){
//   $role=new Role;
//   $role->name="subscriber";
//   $role->save();
//});
//middleware create for this route call admin and startup as contract inside controller
Route::resource('/admin/users', 'AdminUsersController');

//Route::group(['middleware'=>'auth','middleware'=>'admin'],function(){
Route::group(['middleware'=>'admin'],function(){

    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/posts', 'AdminPostsController');
    Route::resource('/admin/categories','AdminCategoriesController');

});



