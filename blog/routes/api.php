<?php

use Illuminate\Http\Request;
Use App\Http\Controllers\UserController;
Use App\Http\Controllers\BlogPostController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', 'UserController@getAllUsers');
Route::get('users/{id}', 'UserController@getUser');
Route::put('edit_user/{id}', 'UserController@updateUser');

Route::get('blog_posts', 'BlogPostController@getAllBlogPosts');
Route::get('blog_posts/user/{id}', 'BlogPostController@getUserBlogPosts');
Route::get('blog_posts/{id}', 'BlogPostController@getBlogPost');
Route::post('create_blog_post', 'BlogPostController@createBlogPost');
