<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $blogs = Post::latest()->take(6)->get();

        // Gunakan null coalescing untuk menghindari error 'Attempt to read property on null'
        $prestasiPage = Page::where('slug', 'prestasi-siswa')->first() ?? new Page(['content' => []]);
        $unggulanPage = Page::where('slug', 'program-unggulan')->first() ?? new Page(['content' => []]);
        $fasilitasPage = Page::where('slug', 'fasilitas-sekolah')->first() ?? new Page(['content' => []]);

        return view('theme.page.home.index', compact('blogs', 'prestasiPage', 'unggulanPage', 'fasilitasPage'));
    }

    // public function profil()
    // {
    //     return view('theme.page.profil.index');
    // }

    // public function kontak()
    // {

    //     $page = Page::where('slug', 'kontak')->firstOrFail();

    //     return view('theme.page.kontak.index', [
    //         'page' => $page
    //     ]);
    // }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        return view('theme.page.show.index', compact('page'));
    }
}
