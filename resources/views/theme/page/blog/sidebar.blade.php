<aside class="space-y-8">

    {{-- WIDGET 1: POSTINGAN TERBARU --}}
    <div class="bg-gray-100 rounded-2xl p-6 shadow-lg border border-gray-100">
        <h3 class="text-lg font-bold text-blue-950 mb-4 pb-2 border-b-2 border-pink-500 inline-block">
            Artikel Terbaru
        </h3>
        <div class="space-y-4">
            @foreach ($recentPosts as $recent)
                <a href="{{ url('blog/' . $recent->slug) }}" class="flex items-start gap-3 group">
                    <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0 bg-gray-100">
                        <img src="{{ $recent->thumbnail ? asset('storage/' . $recent->thumbnail) : asset('logoapp.png') }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-200"
                            alt="">
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4
                            class="text-sm font-semibold text-gray-800 group-hover:text-pink-600 transition line-clamp-2 leading-snug">
                            {{ $recent->title }}
                        </h4>
                        <span class="text-[11px] text-gray-400 block mt-1">
                            {{ $recent->created_at->diffForHumans() }}
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    {{-- WIDGET 2: KATEGORI (Tag Cloud Hijau khas kemarin, versi minimalis sidebar) --}}
    <div class="bg-gray-100 rounded-2xl p-6 shadow-lg border border-gray-100">
        <h3 class="text-lg font-bold text-blue-950 mb-4 pb-2 border-b-2 border-pink-500 inline-block">
            Kategori
        </h3>
        <div class="flex flex-wrap gap-2">
            @foreach ($categories as $cat)
                <a href="{{ url('/blog?category=' . $cat->slug) }}"
                    class="inline-flex items-center gap-1.5 bg-[#149464] hover:bg-[#0f7a52] text-white text-xs font-semibold px-3 py-2 rounded-lg shadow-sm transition">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3.5 h-3.5">
                        <path fill-rule="evenodd"
                            d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39.92 3.31 0l4.318-4.317c.92-.92.92-2.39 0-3.31l-9.58-9.581A3 3 0 0 0 8.567 2.25H5.25ZM6.75 7.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>{{ $cat->name }}</span>
                    <span class="bg-white/20 px-1 rounded text-[10px] font-bold">{{ $cat->posts_count }}</span>
                </a>
            @endforeach
        </div>
    </div>

</aside>
