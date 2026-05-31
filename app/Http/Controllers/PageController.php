<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PageController extends Controller
{
    public function index()
    {
        $newpost = Post::latest()->take(6)->get();

        $blogs = Post::whereHas('category', function ($query) {
            $query->whereNotIn('slug', ['pengumuman', 'sambutan', 'prestasi-siswa']); // Menggunakan whereNotIn untuk mengecualikan banyak slug sekaligus
        })->latest()->take(6)->get();

        // 2. Ambil data pengumuman (PASTIKAN VARIABEL INI ADA)
        $pengumuman = Post::whereHas('category', function ($query) {
            $query->where('slug', 'pengumuman');
        })->latest()->take(3)->get();

        $sambutan = Post::whereHas('category', function ($query) {
            $query->where('slug', 'sambutan');
        })->latest()->take(3)->get();

        $prestasi = Post::whereHas('category', function ($query) {
            $query->where('slug', 'prestasi-siswa');
        })->latest()->take(6)->get();

        $categories = Category::all();

        return view('theme.page.home.index', compact(
            'blogs',
            'prestasi',
            'sambutan',
            'pengumuman',
            'newpost',
            'categories',
        ));
    }
}
