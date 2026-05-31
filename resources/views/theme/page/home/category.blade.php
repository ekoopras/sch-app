<section class="py-12 bg-gray-100">
    <div class="w-[95%] lg:w-[90%] mx-auto">

        {{-- Header Section (Opsional, teks dibuat center juga) --}}
        <div class="mb-8 border-b border-gray-150 pb-4 text-center" data-aos="fade-up">
            <h2 class="text-xl md:text-2xl font-black text-blue-950 uppercase tracking-wide">
                Tag <span class="text-pink-600">Kategori</span>
            </h2>
        </div>

        {{-- PERUBAHAN UTAMA: Ditambahkan 'justify-center' agar semua item otomatis ngumpul di tengah --}}
        <div class="flex flex-wrap gap-x-3 gap-y-4 justify-center" data-aos="fade-up">

            @forelse ($categories as $cat)
                {{-- ITEM BADGE TAGS --}}
                <a href="{{ url('/blog?category=' . $cat->slug) }}"
                    class="inline-flex items-center gap-2 bg-[#149464] hover:bg-[#0f7a52] text-white text-sm md:text-base font-medium px-4 py-2.5 rounded-lg shadow-sm hover:shadow transition duration-200 group">

                    {{-- Ikon Tag Kategori --}}
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-4 h-4 text-white transform group-hover:scale-110 transition duration-200">
                        <path fill-rule="evenodd"
                            d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39.92 3.31 0l4.318-4.317c.92-.92.92-2.39 0-3.31l-9.58-9.581A3 3 0 0 0 8.567 2.25H5.25ZM6.75 7.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                            clip-rule="evenodd" />
                    </svg>

                    {{-- Nama Kategori --}}
                    <span class="tracking-wide">
                        {{ $cat->name }}
                    </span>

                    @if (method_exists($cat, 'posts'))
                        <span class="text-[10px] bg-white/20 px-1.5 py-0.5 rounded text-gray-100 font-bold ml-1">
                            {{ $cat->posts()->count() }}
                        </span>
                    @endif

                </a>
            @empty
                <div class="text-center py-4 text-gray-400 italic text-sm w-full">
                    Belum ada data kategori.
                </div>
            @endforelse

        </div>

    </div>
</section>
