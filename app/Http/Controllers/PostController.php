<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function blog()
    {
        // 1. Tambahkan filter is_published agar draft tidak muncul
        // 2. Tambahkan eager loading 'category' untuk performa (N+1 Issue)
        $blogs = Post::with('category')
            ->where('is_published', true)
            ->latest()
            ->paginate(9);

        return view('theme.page.blog.index', compact('blogs'));
    }

    public function show($slug)
    {
        // Cari post yang aktif saja
        $post = Post::with('category')
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Ambil postingan terbaru (pastikan hanya yang published)
        $recentPosts = Post::where('id', '!=', $post->id)
            ->where('is_published', true) // Penting! Jangan tampilkan draft di sidebar
            ->latest()
            ->take(5)
            ->get();

        return view('theme.page.blog.show.show', compact('post', 'recentPosts'));
    }
}
