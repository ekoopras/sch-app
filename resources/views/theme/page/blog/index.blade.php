@extends('theme.layout.app')

@section('title', 'Berita Terbaru')

@section('content')

    {{-- 1. PEMBUNGKUS SECTION UTAMA --}}
    <section class="py-12 min-h-screen">
        <div class="w-[90%] mx-auto">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

                {{-- KOLOM KIRI: AREA KONTEN UTAMA (Memakan space 2 kolom di Laptop) --}}
                <div class="lg:col-span-2">
                    @include('theme.page.blog.content')
                </div>

                {{-- KOLOM KANAN: AREA SIDEBAR (Memakan space 1 kolom sisa di Laptop) --}}
                <div class="lg:col-span-1">
                    @include('theme.page.blog.sidebar')
                </div>

            </div>

        </div>
    </section>

@endsection
