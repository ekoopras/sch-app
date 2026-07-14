<section class="relative bg-gray-100 py-16 md:py-24 overflow-hidden" x-data="{
    currentIndex: 0,
    // Fungsi scroll presisi ala Android snap
    scrollTo(index) {
        this.currentIndex = index;
        const container = this.$refs.sliderContainer;
        const slide = container.children[index];
        if (slide) {
            container.scrollTo({ left: slide.offsetLeft - 16, behavior: 'smooth' }); // -16px untuk padding kiri asli ala apps
        }
    },
    // Sinkronisasi dots saat user swipe manual pakai jari di HP
    updateIndex() {
        const container = this.$refs.sliderContainer;
        const slideWidth = container.firstElementChild.getBoundingClientRect().width + 16;
        this.currentIndex = Math.round(container.scrollLeft / slideWidth);
    }
}">

    {{-- Header Section --}}
    <div class="text-center" data-aos="fade-up">
        <h2 class="text-3xl md:text-4xl font-bold text-blue-950">Prestasi <span class="text-pink-600">Siswa</span>
        </h2>
        <div class="w-24 h-1.5 bg-blue-950 mx-auto mt-4 rounded-full"></div>
        <p class="text-gray-500 mt-6 max-w-2xl mx-auto p-3">
        </p>
    </div>


    <div class="relative z-10 w-[90%] mx-auto"> {{-- Menggunakan w-full agar mentok ke pinggir layar HP ala Android --}}

        {{-- AREA SLIDER CAROUSEL (Android Native Feel) --}}
        {{-- px-4 memberi bantalan di kiri awal, snap-x wajib untuk efek gembok scroll --}}
        <div class="flex gap-4 overflow-x-auto snap-x snap-mandatory scroll-smooth scrollbar-none pb-16 px-4"
            x-ref="sliderContainer" @scroll.debounce.100ms="updateIndex()">

            @forelse ($prestasi as $index => $item)
            {{-- CARD ITEM (UKURAN ALA ANDROID APP) --}}
            {{-- w-[85%] di HP biar card sebelah kanan kelihatan ngintip sedikit --}}
            {{-- sm:w-[45%] di tablet, md:w-[31%] di laptop/PC --}}
            <div class="w-[85%] sm:w-[45%] md:w-[31%] shrink-0 snap-center relative group cursor-pointer">

                {{-- Gambar / Thumbnail (Tinggi sudah disesuaikan agar proporsional) --}}
                <a href="{{ url('blog/' . $item->slug) }}">
                    <div
                        class="w-full aspect-[4/3] rounded-2xl overflow-hidden shadow-sm border border-gray-100 relative bg-gray-50">
                        @if ($item->thumbnail)
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                            class="w-full h-full object-cover">
                        @else
                        <div
                            class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-900 to-indigo-950 text-white font-bold text-lg select-none">
                            SPENSATA INFO
                        </div>
                        @endif

                        {{-- Badge Admin --}}
                        <div
                            class="absolute top-4 left-4 z-20 flex items-center gap-1.5 bg-emerald-600 text-white text-xs font-semibold px-3 py-1.5 rounded-lg shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-3.5 h-3.5">
                                <path fill-rule="evenodd"
                                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>admin</span>
                        </div>
                    </div>

                    {{-- Kotak Judul Melayang --}}
                    <div
                        class="absolute left-3 right-3 bottom-0 translate-y-[25%] z-30 bg-white rounded-xl shadow-lg border border-gray-100 p-4 min-h-[90px] flex items-center justify-center text-center">
                        <h3
                            class="text-sm md:text-base font-extrabold text-blue-950 tracking-wide uppercase line-clamp-2 leading-snug">
                            <div
                                class="hover:text-blue-800 transition block w-full">
                                {{ $item->title }}
                            </div>
                        </h3>
                    </div>
                </a>

            </div>
            @empty
            <div class="text-center py-12 text-gray-400 italic w-full">
                Belum ada data artikel post saat ini.
            </div>
            @endforelse

        </div>

        {{-- ANDROID STYLE INDICATOR DOTS --}}
        @if (count($prestasi) > 1)
        <div class="absolute bottom-4 left-0 right-0 flex justify-center items-center space-x-1.5 z-40">
            @foreach ($prestasi as $index => $item)
            {{-- Efek transisi melebar pas aktif khas UI Android modern --}}
            <button class="h-2 rounded-full transition-all duration-300 ease-out"
                :class="currentIndex === {{ $index }} ? 'w-6 bg-blue-950' : 'w-2 bg-gray-300'"
                @click="scrollTo({{ $index }})">
            </button>
            @endforeach
        </div>
        @endif

    </div>

    <style>
        .scrollbar-none::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-none {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</section>