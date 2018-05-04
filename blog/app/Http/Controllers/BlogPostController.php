<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\BlogPost;
Use App\User;

class BlogPostController extends Controller
{
    public function getAllBlogPosts() {
        return BlogPost::all();
    }

    public function getUserBlogPosts($id) {
        return User::find($id)->blogPosts;
    }

    public function getBlogPost($id) {
        return BlogPost::find($id);
    }

    public function createBlogPost(Request $request) {
        $blogPost = BlogPost::create($request->all());
        return response()->json($blogPost, 201);
    }
}
