<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //$posts=Post::all(); // Assuming you have a Post model to fetch posts
        //$posts=Post::latest()->get(); // Assuming you have a Post model to fetch posts
        $posts=Post::latest()->paginate(10); // Fetches posts with pagination
     return view('posts.index', compact('posts'));
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
