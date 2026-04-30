<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
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

Route::get('/', [PageController::class, 'index'])
    ->name('home');

Route::get('/blog', [PostController::class, 'blog'])
    ->name('blog');

Route::get('/blog/{slug}', [PostController::class, 'show'])
    ->name('blog.show');



// Route::get('/prestasi-siswa', [PageController::class, 'prestasi'])
//     ->name('prestasi');

Route::get('/{slug}', [PageController::class, 'show'])->name('page.show');

// Route::prefix('blog')->group(function () {
//     Route::get('/', [PostController::class, 'blog'])->name('blog');
//     Route::get('/{slug}', [PostController::class, 'show'])->name('blog.show');
// });
