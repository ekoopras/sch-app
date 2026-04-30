<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        //var blog
        $blogs = Post::latest()->take(6)->get();

        //var prestasi
        $prestasiPage = Page::where('slug', 'prestasi-siswa')->first();

        //var program unggulan
        $unggulanPage = Page::where('slug', 'program-unggulan')->first();

        //var fasilitas sekolah
        $fasilitasPage = Page::where('slug', 'fasilitas-sekolah')->first();

        return view('theme.page.home.index', compact('blogs', 'prestasiPage', 'unggulanPage', 'fasilitasPage'));
    }

    // public function VisiMisi()
    // {
    //     $page = Page::where('slug', 'visi-misi')->firstOrFail();

    //     return view('theme.page.visi-misi.index', [
    //         'page' => $page
    //     ]);
    // }

    public function profil()
    {
        return view('theme.page.profil.index');
    }

    // public function blog()
    // {
    //     //var blog grid
    //     $blogs = Post::latest()->paginate(9);

    //     return view('theme.page.blog.index', compact('blogs'));
    // }

    public function kontak()
    {

        $page = Page::where('slug', 'kontak')->firstOrFail();

        return view('theme.page.kontak.index', [
            'page' => $page
        ]);
    }

    // public function prestasi()
    // {
    //     $page = Page::where('slug', 'prestasi-siswa')->firstOrFail();

    //     return view('theme.page.prestasi.index', [
    //         'page' => $page
    //     ]);
    // }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        return view('theme.page.show.index', compact('page'));
    }
}
