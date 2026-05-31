<section class="bg-white">
    <div class="w-full mx-auto"> {{-- Diubah ke w-full karena parent luar (index.blade) sudah mengunci w-[90%] --}}

        {{-- Grid Wrapper: Diberi gap-y-16 agar judul melayang baris pertama tidak menabrak gambar baris kedua --}}
        <div class="grid grid-cols-2 lg:grid-cols-2 gap-x-4 gap-y-20 md:gap-x-8 md:gap-y-16 pb-12">

            @forelse($blogs as $item)
                {{-- CARD BERGAYA 2 KOLOM MOBILE --}}
                <div class="w-full relative group cursor-pointer" data-aos="fade-up">

                    {{-- Gambar / Thumbnail --}}
                    <div
                        class="w-full aspect-[4/3] rounded-2xl overflow-hidden shadow-sm border border-gray-100 relative bg-gray-50">
                        @if ($item->thumbnail)
                            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                                class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                        @else
                            <div
                                class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-900 to-indigo-950 text-white font-bold text-[10px] md:text-lg select-none text-center p-2">
                                SPENSATA INFO
                            </div>
                        @endif

                        {{-- Badge Kategori: Dibuat hidden di HP (sm:block) agar tidak menabrak badge admin karena layar sempit --}}
                        <div class="absolute top-2 right-2 md:top-4 md:right-4 z-20 hidden sm:block">
                            <span
                                class="bg-white/90 backdrop-blur-md text-blue-950 text-[9px] md:text-[10px] px-2.5 py-1 rounded-md uppercase tracking-widest font-bold shadow-sm">
                                {{ $item->category->name ?? 'Berita' }}
                            </span>
                        </div>

                        {{-- Badge Admin: Ukuran disesuaikan mengecil di HP --}}
                        <div
                            class="absolute top-2 left-2 md:top-4 md:left-4 z-20 flex items-center gap-1 bg-emerald-600 text-white text-[9px] md:text-xs font-semibold px-2 py-1 rounded-md shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-3 h-3 md:w-3.5 md:h-3.5">
                                <path fill-rule="evenodd"
                                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>admin</span>
                        </div>
                    </div>

                    {{-- Kotak Judul Melayang: Padding (p-2.5) & Text (text-xs) disesuaikan khusus HP --}}
                    <div
                        class="absolute left-1.5 right-1.5 bottom-0 translate-y-[30%] md:translate-y-[25%] z-30 bg-white rounded-xl shadow-md border border-gray-100 p-2.5 md:p-4 min-h-[65px] md:min-h-[90px] flex items-center justify-center text-center group-hover:border-pink-500 transition-colors duration-300">
                        <h3
                            class="text-[11px] sm:text-xs md:text-base font-extrabold text-blue-950 tracking-wide uppercase line-clamp-2 leading-tight">
                            <a href="{{ url('blog/' . $item->slug) }}"
                                class="group-hover:text-pink-600 transition block w-full">
                                {{ $item->title }}
                            </a>
                        </h3>
                    </div>

                </div>

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

        {{-- Pagination Bergaya Kotak Hijau Elegan Sesuai Gambar --}}
        @if ($blogs->hasPages())
            <div class="mt-24 flex justify-center items-center gap-2 sm:gap-4 select-none">

                {{-- TOMBOL PREV --}}
                @if ($blogs->onFirstPage())
                    <span
                        class="flex items-center gap-1.5 px-3 py-2 text-sm font-bold text-gray-300 cursor-not-allowed">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M15 19l-7-7 7-7" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        PREV
                    </span>
                @else
                    <a href="{{ $blogs->previousPageUrl() }}"
                        class="flex items-center gap-1.5 px-3 py-2 text-sm font-bold text-blue-950 hover:text-[#149464] transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M15 19l-7-7 7-7" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        PREV
                    </a>
                @endif

                {{-- LOOPING NOMOR HALAMAN --}}
                <div class="flex items-center gap-2">
                    @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                        @if ($page == $blogs->currentPage())
                            {{-- STATE AKTIF: Kotak Hijau Penuh, Teks Putih (Angka 2 di Gambar) --}}
                            <span
                                class="w-11 h-11 rounded-xl bg-[#149464] text-white font-extrabold flex items-center justify-center text-base shadow-sm shadow-[#149464]/20">
                                {{ $page }}
                            </span>
                        @else
                            {{-- STATE BIASA: Kotak Putih/Abu, Border Hijau, Teks Gelap (Angka 1, 3, 4 di Gambar) --}}
                            <a href="{{ $url }}"
                                class="w-11 h-11 rounded-xl bg-gray-50 border border-[#149464] text-blue-950 font-extrabold flex items-center justify-center text-base hover:bg-[#149464] hover:text-white transition-all duration-300 active:scale-95">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                </div>

                {{-- TOMBOL NEXT --}}
                @if ($blogs->hasMorePages())
                    <a href="{{ $blogs->nextPageUrl() }}"
                        class="flex items-center gap-1.5 px-3 py-2 text-sm font-bold text-blue-950 hover:text-[#149464] transition-colors duration-200">
                        NEXT
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M9 5l7 7-7 7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                @else
                    <span
                        class="flex items-center gap-1.5 px-3 py-2 text-sm font-bold text-gray-300 cursor-not-allowed">
                        NEXT
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M9 5l7 7-7 7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                @endif

            </div>
        @endif

    </div>
</section>
