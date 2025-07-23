<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/category/{category}', [PostController::class, 'postsByCategory'])->name('posts.category');
Route::get('/posts/tag/{tag}', [PostController::class, 'postsByTag'])->name('posts.tag');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
//Route::get('/posts/{post}/comment', [PostController::class, 'comment'])->name('posts.comment');
Route::post('/posts/{post}/comment', [PostController::class, 'comment'])->name('posts.comment');

// Route::middleware(['auth', 'admin'])->group(function () {
Route::resource('admin/posts', AdminController::class)->except('show')->names('admin.posts')->middleware('admin');

// });
require __DIR__ . '/auth.php';
