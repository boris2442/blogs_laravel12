<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::latest()->paginate(10); // Fetches posts with pagination
        return view('posts.index', compact('posts'));
    }

    public function postsByCategory(Category $category)
    {
        return view('posts.index', [

            'posts' => Post::where('category_id', $category->id)->latest()->paginate(10),
            // 'currentCategory' => $category // Pass the current
        ]);
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
