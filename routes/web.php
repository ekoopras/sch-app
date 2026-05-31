<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'index'])
    ->name('home');

Route::get('/blog', [PostController::class, 'blog'])
    ->name('blog');

Route::get('/blog/{slug}', [PostController::class, 'show'])
    ->name('blog.show');
