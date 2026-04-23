<section class="py-16 bg-white">
    <div class="w-[90%] mx-auto">

        {{-- Grid Wrapper --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">

            @forelse($blogs as $post)
                <article
                    class="group bg-white rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden"
                    data-aos="fade-up">
                    {{-- Image Container --}}
                    <div class="relative overflow-hidden aspect-video md:aspect-[4/3]">
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">

                        {{-- Badge Kategori --}}
                        <div class="absolute top-5 left-5">
                            <span
                                class="bg-white/90 backdrop-blur-md text-blue-950 text-[10px] px-4 py-1.5 rounded-full uppercase tracking-widest font-bold shadow-sm">
                                {{ $post->category->name ?? 'Berita' }}
                            </span>
                        </div>

                        {{-- Overlay saat Hover --}}
                        <div
                            class="absolute inset-0 bg-blue-950/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                    </div>

                    {{-- Konten Teks --}}
                    <div class="p-8"> {{-- Diubah dari px-2 ke p-8 agar konten tidak mepet border --}}
                        <div class="flex items-center gap-3 text-gray-400 text-xs mb-4 font-medium">
                            <span class="flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $post->created_at->format('d M Y') }}
                            </span>
                        </div>

                        <h3
                            class="text-xl md:text-2xl font-bold text-blue-950 group-hover:text-pink-600 transition-colors line-clamp-2 leading-snug mb-4">
                            <a href="{{ route('blog.show', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h3>

                        <p class="text-gray-500 text-sm md:text-base line-clamp-2 mb-8 leading-relaxed">
                            {{ Str::limit(strip_tags($post->content), 120) }}
                        </p>

                        <a href="{{ route('blog.show', $post->slug) }}"
                            class="inline-flex items-center gap-3 text-blue-950 font-bold text-sm group/btn">
                            <span>Baca Selengkapnya</span>
                            <div
                                class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center group-hover/btn:bg-blue-950 group-hover/btn:text-white transition-all shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </div>
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-full py-20 text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-blue-950">Belum Ada Berita</h3>
                </div>
            @endforelse

        </div>

        {{-- Pagination Simpel (Sesuai Request) --}}
        @if ($blogs->hasPages())
            <div class="mt-20 flex justify-center items-center gap-4">
                @if (!$blogs->onFirstPage())
                    <a href="{{ $blogs->previousPageUrl() }}"
                        class="flex items-center gap-2 px-6 py-3 bg-white border-2 border-blue-950 text-blue-950 font-bold rounded-full hover:bg-blue-950 hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Prev
                    </a>
                @endif

                <span class="px-6 py-3 bg-blue-50 text-blue-950 font-bold rounded-full text-sm">
                    {{ $blogs->currentPage() }}
                </span>

                @if ($blogs->hasMorePages())
                    <a href="{{ $blogs->nextPageUrl() }}"
                        class="flex items-center gap-2 px-6 py-3 bg-blue-950 text-white font-bold rounded-full hover:bg-pink-600 transition-all duration-300 shadow-lg shadow-blue-900/10">
                        Next
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                @endif
            </div>
        @endif

    </div>
</section>
