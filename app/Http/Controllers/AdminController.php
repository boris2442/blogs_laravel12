<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    protected $middleware = ['admin'];
    // public function __construct()
    // {
    //   $this->middleware('admin');  
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::without('category', 'tags')->latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();
        return view('admin.posts.form', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(PostRequest $request)
    // {
    //     $validated = $request->validated();
    //     $validated['thumbnail'] = $validated['thumbnail']->store('thumbnails');
    //     // ✅ Ajout de l'auteur (utilisateur connecté)
    //     $validated['user_id'] = auth()->id();
    //     $validated['excerpt'] = Str::limit(strip_tags($validated['content']), 150);
    //     $post = Post::create($validated);
    //     $post->tags()->sync($validated['tags_ids'] ?? []);
    //     return redirect()->route('posts.show', ['post' => $post])->with('success', 'Post created successfully.');
    // }

    public function store(PostRequest $request)
    {
        $validated = $request->validated();

        // Stocke l'image
        $validated['thumbnail'] = $validated['thumbnail']->store('thumbnails');

        // Crée un extrait du contenu
        $validated['excerpt'] = Str::limit(strip_tags($validated['content']), 150);

        // ✅ Ajoute l'utilisateur connecté
        $validated['user_id'] = auth()->id(); // ⬅️ Très important

        // Crée le post
        $post = Post::create($validated);

        // Lie les tags s’ils existent
        $post->tags()->sync($validated['tags_ids'] ?? []);

        return redirect()->route('posts.show', ['post' => $post])->with('success', 'Post created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // $post= Post::findOrFail($post->id);
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        return view('admin.posts.edit-post', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(PostRequest $request, Post $post)
    // {
    //     $validated = $request->validated();

    //     // Si une nouvelle image est fournie, stocke-la
    //     if ($request->hasFile('thumbnail')) {
    //         $validated['thumbnail'] = $validated['thumbnail']->store('thumbnails');
    //     } else {
    //         // Sinon, conserve l'ancienne image
    //         $validated['thumbnail'] = $post->thumbnail;
    //     }

    //     // Met à jour l'extrait du contenu
    //     $validated['excerpt'] = Str::limit(strip_tags($validated['content']), 150);

    //     // Met à jour le post
    //     $post->update($validated);

    //     // Met à jour les tags
    //     $post->tags()->sync($validated['tags_ids'] ?? []);

    //     return redirect()->route('posts.show', ['post' => $post])->with('success', 'Post updated successfully.');
    // }
    public function update(PostRequest $request, Post $post)
    {
        $validated = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $validated['thumbnail']->store('thumbnails');
        } else {
            $validated['thumbnail'] = $post->thumbnail;
        }

        $validated['excerpt'] = Str::limit(strip_tags($validated['content']), 150);

        // 🔥 Supprime tags_ids du tableau validé avant update
        unset($validated['tags_ids']);

        // Mets à jour le post
        $post->update($validated);

        // Synchronise les tags
        $post->tags()->sync($request->input('tags_ids', []));

        return redirect()->route('posts.show', ['post' => $post])
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post = Post::findOrFail($post->id);
        // Supprime le post
        $post->delete();

        // Redirige vers la liste des posts avec un message de succès
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}
