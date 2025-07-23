<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;
use Illuminate\View\View as ViewView;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // If a search query is present, filter posts by title or content
        if ($request->has('search')) {
            $search = $request->input('search');
            $posts = Post::where('title', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%')
                ->latest()
                ->paginate(10);
        } else {
            // Otherwise, fetch all posts with pagination
            $posts = Post::latest()->paginate(10);
        }
        // Return the view with posts
        return view('posts.index', compact('posts'));
    }


    public function postsByCategory(Category $category)
    {
        return view('posts.index', [

            'posts' => Post::where('tag', $category->id)->latest()->paginate(10),
            // 'currentCategory' => $category // Pass the current
        ]);
    }

    public function postsByTag(Tag $tag)
    {
        return view('posts.index', [

            'posts' => Post::whereRelation('tags', 'tags.id', $tag->id)->latest()->paginate(10),
            // 'currentCategory' => $category // Pass the current
        ]);
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
