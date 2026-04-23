@extends('theme.layout.app')

@section('title', $post->meta_title ?? $post->title)
@section('meta_description', $post->meta_description)

@section('content')
    <article class="max-w-4xl mx-auto">
        <header class="mb-8">
            <a href="/" class="text-blue-600 text-sm mb-4 inline-block">&larr; Kembali ke Beranda</a>
            <h1 class="text-4xl font-extrabold text-gray-900 leading-tight">{{ $post->title }}</h1>
            <div class="flex items-center text-gray-500 text-sm mt-4">
                <span>Kategori: <strong class="text-gray-700">{{ $post->category->name }}</strong></span>
                <span class="mx-2">&bull;</span>
                <span>{{ $post->published_at?->format('d M Y') }}</span>
            </div>
        </header>

        @if ($post->thumbnail)
            <div class="mb-8">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                    class="w-full rounded-xl shadow-lg">
            </div>
        @endif

        <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
            {!! $post->content !!}
        </div>

        @if ($post->tags)
            <div class="mt-12 pt-6 border-t">
                <div class="flex flex-wrap gap-2">
                    @foreach ($post->tags as $tag)
                        <span
                            class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-medium italic">#{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
        @endif
    </article>
@endsection
