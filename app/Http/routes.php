<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controllers([
'auth' => 'Auth\AuthController',
'password' => 'Auth\PasswordController',
]); 

// check for logged in user
Route::controllers([
'auth' => 'Auth\AuthController',
'password' => 'Auth\PasswordController',
]);
// check for logged in user
Route::group(['middleware' => ['auth']], function()
{
// show new post form
Route::get('new-post','PostController@create');
// save new post
Route::post('new-post','PostController@store');
// edit post form
Route::get('edit/{slug}','PostController@edit');
// update post
Route::post('update','PostController@update');
// delete post
Route::get('delete/{id}','PostController@destroy');
// display user's all posts
Route::get('my-all-posts','UserController@user_posts_all');
// display user's drafts
Route::get('my-drafts','UserController@user_posts_draft');
// add comment
Route::post('comment/add','CommentController@store');
// delete comment
Route::post('comment/delete/{id}','CommentController@distroy');
}); 

//Route::get('Home','BlogController@index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

// Route::group(['middleware' => ['web']], function () {
//     //
// });

// Route::group(['middleware' => 'web'], function () {
//     Route::auth();

//     Route::get('/home', 'HomeController@index');
// });

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
