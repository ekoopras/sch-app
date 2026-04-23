<section class="relative w-full bg-white py-16 md:py-24 overflow-hidden" x-data="{
    scrollTo(direction) {
        const container = this.$refs.blogSlider;
        const scrollAmount = container.querySelector('.snap-start').offsetWidth + 24;
        container.scrollBy({
            left: direction === 'next' ? scrollAmount : -scrollAmount,
            behavior: 'smooth'
        });
    }
}">

    <div class="relative z-10 w-[90%] mx-auto">
        {{-- Header --}}
        <div class="flex justify-between items-end mb-10">
            <div data-aos="fade-right">
                <span class="text-pink-600 font-bold tracking-widest uppercase text-sm">Informasi Terkini</span>
                <h2 class="text-2xl md:text-4xl font-bold text-blue-950 mt-2">Berita & <span
                        class="text-blue-700">Blog</span></h2>
                <div class="w-12 h-1 bg-pink-500 mt-2 rounded-full"></div>
            </div>

            {{-- Navigasi Desktop --}}
            <div class="hidden md:flex gap-3">
                <button @click="scrollTo('prev')"
                    class="w-10 h-10 rounded-full border border-gray-200 bg-white flex items-center justify-center hover:bg-blue-950 hover:text-white transition-all shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <button @click="scrollTo('next')"
                    class="w-10 h-10 rounded-full border border-gray-200 bg-white flex items-center justify-center hover:bg-blue-950 hover:text-white transition-all shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Slider Container --}}
        <div class="relative -mx-6 md:mx-0">
            <div x-ref="blogSlider"
                class="flex overflow-x-auto snap-x snap-mandatory gap-6 no-scrollbar pl-6 md:pl-0 pr-6 pb-10"
                style="scrollbar-width: none; -ms-overflow-style: none;">

                @foreach ($blogs as $post)
                    <div class="flex-none w-[85%] md:w-[45%] lg:w-1/3 snap-start">
                        <article
                            class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-500 group h-full flex flex-col">
                            {{-- Foto Thumbnail --}}
                            <div class="relative h-52 md:h-60 overflow-hidden">
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                    class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">

                                {{-- Label Kategori --}}
                                <div class="absolute top-4 left-4">
                                    <span
                                        class="bg-blue-950/80 backdrop-blur-md text-white text-[10px] px-3 py-1 rounded-full uppercase tracking-widest font-bold">
                                        {{ $post->category->name ?? 'Berita' }}
                                    </span>
                                </div>
                            </div>

                            {{-- Konten Teks --}}
                            <div class="p-6 flex flex-col flex-grow">
                                <div class="flex items-center gap-3 text-gray-400 text-xs mb-3">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        {{ $post->created_at->format('d M Y') }}
                                    </span>
                                </div>

                                <h3
                                    class="text-xl font-bold text-blue-950 group-hover:text-pink-600 transition-colors line-clamp-2 mb-3">
                                    <a href="{{ route('blog.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>

                                <p class="text-gray-500 text-sm line-clamp-3 mb-6">
                                    {{ Str::limit(strip_tags($post->content), 100) }}
                                </p>

                                <div class="mt-auto">
                                    <a href="{{ route('blog.show', $post->slug) }}"
                                        class="inline-flex items-center gap-2 text-blue-950 font-bold text-sm group/link">
                                        Baca Selengkapnya
                                        <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- Button Selengkapnya Mobile --}}
        <div class="mt-4 text-center md:hidden">
            <a href="/blog"
                class="inline-flex items-center gap-2 px-8 py-3 bg-blue-950 text-white font-bold rounded-full shadow-lg">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
</style>
