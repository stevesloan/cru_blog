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



// /create_blog_post
// params: (whatever is needed to create a new blog post)
//
// /edit_user
// edit a user’s details, including their role and address
// params: (whatever is needed to accomplish this)
