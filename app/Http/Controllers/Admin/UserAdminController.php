<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserAdminController extends Controller
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
        $users=User::paginate(10);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        return view('admin.users.form');
    }

  

    public function store(UserRequest $request)
    {
        $validated = $request->validated();

       

        // Crée le post
        $user = User::create($validated);

       

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
 
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
  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user = User::findOrFail($user->id);
        // Supprime le user
        $user->delete();

        // Redirige vers la liste des users avec un message de succès
        return redirect()->route('admin.users.index')->with('success', 'user deleted successfully.');
    }
    
}
