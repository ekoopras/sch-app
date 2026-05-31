@extends('theme.layout.app')

@section('content')
    {{-- @include('theme.page.blog.show.hero') --}}
    <section class="py-8 md:py-8 bg-white relative overflow-hidden">
        {{-- Dekorasi Latar Belakang --}}
        <div class="absolute top-0 right-0 w-[500px] h-[500px] rounded-full blur-[120px]"></div>

        <div class="container w-[90%] xl:w-[90%] mx-auto relative z-10">
            <div class="flex flex-col lg:flex-row gap-12">

                {{-- Kolom Konten Utama (Kiri) --}}
                <div class="lg:w-2/3">
                    @include('theme.page.blog.show.main')
                </div>

                {{-- Kolom Sidebar (Kanan) --}}
                <aside class="lg:w-1/3">
                    @include('theme.page.blog.sidebar')
                </aside>

            </div>
        </div>
    </section>
@endsection
