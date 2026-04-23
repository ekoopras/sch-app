<?php

use App\Http\Controllers\PageController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     $posts = Post::where('is_published', true)
//         ->latest('published_at')
//         ->paginate(6);
//     return view('theme.page.index', compact('posts'));
// });

Route::get('/blog/{slug}', function ($slug) {
    $post = Post::where('slug', $slug)->firstOrFail();
    return view('theme.page.show', compact('post'));
})->name('blog.show');

Route::get('/', [PageController::class, 'index'])
    ->name('home');

Route::get('/visi-misi', [PageController::class, 'VisiMisi'])
    ->name('visi-misi');

Route::get('/profil', [PageController::class, 'profil'])
    ->name('profile');

Route::get('/blog', [PageController::class, 'blog'])
    ->name('blog');

Route::get('/kontak', [PageController::class, 'kontak'])
    ->name('kontak');
