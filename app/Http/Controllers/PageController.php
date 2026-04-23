<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        //var blog
        $blogs = Post::latest()->take(6)->get();

        return view('theme.page.home.index', compact('blogs'));
    }

    public function VisiMisi()
    {
        return view('theme.page.visi-misi.index');
    }

    public function profil()
    {
        return view('theme.page.profil.index');
    }

    public function blog()
    {
        //var blog grid
        $blogs = Post::latest()->paginate(9);

        return view('theme.page.blog.index', compact('blogs'));
    }

    public function kontak()
    {
        return view('theme.page.kontak.index');
    }
}
