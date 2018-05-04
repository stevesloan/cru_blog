<?php

use Illuminate\Http\Request;
Use App\User;
Use App\UserRole;
Use App\BlogPost;
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

// users
Route::get('users', function() {
    $arUsers = User::all();
    foreach ($arUsers as $user) {
        $user->role = $user->role;
        $user->post_count = sizeof($user->blogPosts);
        $user->address = $user->address;
    }
    return $arUsers;
});

Route::get('users/{id}', function($id) {
    $user = User::find($id);
    $user->role = $user->role;
    $user->post_count = sizeof($user->blogPosts);
    $user->address = $user->address;
    return $user;
});

Route::put('edit_user/{id}', function($id, Request $request) {
    $user = User::find($id);
    $user->user_roles_id = $request->user_roles_id;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->address->address = $request->address;
    //TODO rest of address
    $user->address->update();
    $user->update();
    return response()->json($user, 200);
});


// blog_posts
Route::get('blog_posts', function() {
    return BlogPost::all();
});

Route::get('blog_posts/user/{id}', function($id) {
    return User::find($id)->blogPosts;
});

Route::get('blog_posts/{id}', function($id) {
    return BlogPost::find($id);
});

Route::post('create_blog_post', function(Request $request) {
    $blogPost = new BlogPost;
    $blogPost->author = $request->author;
    $blogPost->title = $request->title;
    $blogPost->content = $request->content;
    $blogPost->save();
    return response()->json($blogPost, 201);
});
