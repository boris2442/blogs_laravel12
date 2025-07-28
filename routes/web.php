<?php

use App\Http\Controllers\Admin\ContactAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\admin\UserAdminController;

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


// Route::resource('admin/posts', AdminController::class)->except('show')->names('admin.posts')
// ->middleware('admin')
// ;
// Route::middleware(['auth', 'role:admin'])->group(function () {
Route::resource('/admin/posts', AdminController::class)->except('show')->names('admin.posts')

    // ->middleware(['auth', 'admin',])
;
Route::get('/admin/posts/{post}', [AdminController::class, 'show'])->name('admin.posts.show')
    // ->middleware('admin')
;
// });
Route::get('/cgu', [LegalController::class, 'cgu'])->name('cgu');
Route::get('/privacy', [LegalController::class, 'privacy'])->name('privacy.policy');
Route::get('/about', [LegalController::class, 'about'])->name('about');
Route::get('/contact', [LegalController::class, 'contact'])->name('contact');
// Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
// Route::post('/contact/send', [ContactController::class, 'store'])->name('contact

// });

Route::get('/admin/users', [UserAdminController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/create', [UserAdminController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users/create', [UserAdminController::class, 'store'])->name('admin.users.store');
Route::delete('/{user}', [UserAdminController::class, 'destroy'])->name('admin.users.destroy');

Route::get('/admin/contacts', [ContactAdminController::class, 'index'])->name('admin.contacts.index');
Route::delete('/{contact}', [ContactAdminController::class, 'destroy'])->name('admin.contacts.destroy');
require __DIR__ . '/auth.php';
