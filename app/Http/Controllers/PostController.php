<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function blog()
    {
        $blogs = Post::with('category')
            ->where('is_published', true)
            ->latest()
            ->paginate(6);

        // Ambil data untuk Sidebar di Halaman List Blog
        $categories = Category::withCount('posts')->get(); // Ambil kategori + jumlah postingannya
        $recentPosts = Post::where('is_published', true)->latest()->take(5)->get();

        // Kembalikan ke view bersama data sidebar
        return view('theme.page.blog.index', compact('blogs', 'categories', 'recentPosts'));
    }

    public function show($slug)
    {
        $post = Post::with('category')
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Ambil postingan terbaru untuk sidebar (kecuali post yang sedang dibaca)
        $recentPosts = Post::where('id', '!=', $post->id)
            ->where('is_published', true)
            ->latest()
            ->take(10)
            ->get();

        // Ambil data kategori untuk sidebar di halaman detail juga
        $categories = Category::withCount('posts')->get();

        return view('theme.page.blog.show.show', compact('post', 'recentPosts', 'categories'));
    }
}
