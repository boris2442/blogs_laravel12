<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::all(); // Assuming you have a Post model to fetch posts
     return view('posts.index', compact('posts'));
    }
}
