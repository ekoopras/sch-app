<article class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden" data-aos="fade-up">

    <div class="p-8 md:p-12">
        {{-- 1. Meta Data --}}
        <div class="flex items-center gap-4 mb-6 text-sm text-gray-500">
            <span
                class="bg-pink-100 text-pink-600 px-3 py-1 rounded-full font-bold uppercase tracking-wider text-[10px]">
                {{ $post->category->name ?? 'Berita' }}
            </span>
            <span>{{ $post->created_at->format('d M Y') }}</span>
        </div>

        {{-- 2. Judul (Sekarang di atas Gambar) --}}
        <h1 class="text-3xl md:text-5xl font-black text-blue-950 mb-8 leading-tight">
            {{ $post->title }}
        </h1>

        {{-- 3. Gambar Utama (Thumbnail dipindah ke sini) --}}
        @if ($post->thumbnail)
            <div class="aspect-video w-full overflow-hidden rounded-3xl mb-10 shadow-lg">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" class="w-full h-full object-cover"
                    alt="{{ $post->title }}">
            </div>
        @endif

        {{-- 4. ISI KONTEN --}}
        <div
            class="custom-misi-content prose lg:prose-xl max-w-none 
            [&_p]:text-gray-700 [&_p]:leading-relaxed [&_p]:mb-6
            [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:text-blue-900 [&_h2]:mt-8
            [&_ul_li]:relative [&_ul_li]:pl-8 [&_ul_li]:before:content-['→'] [&_ul_li]:before:text-pink-600 [&_ul_li]:before:absolute [&_ul_li]:before:left-0">

            {!! $post->content !!}

        </div>

        {{-- 5. Tag Artikel --}}
        @if ($post->tags)
            <div class="mt-10 pt-10 border-t border-gray-100 flex flex-wrap gap-2">
                @foreach ($post->tags as $tag)
                    <span class="bg-gray-100 text-gray-600 px-4 py-1 rounded-full text-xs font-medium italic">
                        #{{ $tag }}
                    </span>
                @endforeach
            </div>
        @endif
    </div>
</article>
