@extends('theme.layout.app')

@section('title', 'Berita & Artikel Terbaru')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Artikel Terbaru</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($posts as $post)
            <article class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
                @if ($post->thumbnail)
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                        class="h-48 w-full object-cover">
                @endif

                <div class="p-5 flex-1">
                    <span class="text-xs font-semibold text-blue-600 uppercase tracking-wider">
                        {{ $post->category->name }}
                    </span>
                    <h2 class="text-xl font-bold mt-2 leading-tight">
                        <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-blue-600 transition">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 mt-3 text-sm line-clamp-3">
                        {{ Str::limit(strip_tags($post->content), 120) }}
                    </p>
                </div>

                <div class="p-5 border-t border-gray-100 mt-auto">
                    <a href="{{ route('blog.show', $post->slug) }}"
                        class="text-blue-600 font-medium text-sm inline-flex items-center">
                        Baca Selengkapnya &rarr;
                    </a>
                </div>
            </article>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $posts->links() }}
    </div>
@endsection
