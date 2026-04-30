<section class="relative w-full bg-white py-16 md:py-24 overflow-hidden" x-data="{
    slides: {{ json_encode($prestasiSlides) }},
    scrollTo(direction) {
        const container = this.$refs.slider;
        // Geser seukuran satu card agar smooth
        const scrollAmount = container.querySelector('.snap-start').offsetWidth + 24;
        container.scrollBy({
            left: direction === 'next' ? scrollAmount : -scrollAmount,
            behavior: 'smooth'
        });
    }
}">

    {{-- Header Section --}}
    <div class="text-center" data-aos="fade-up">
        <h2 class="text-3xl md:text-4xl font-bold text-blue-950">Program <span class="text-pink-600">Unggulan</span>
        </h2>
        <div class="w-24 h-1.5 bg-blue-950 mx-auto mt-4 rounded-full"></div>
        <p class="text-gray-500 mt-6 max-w-2xl mx-auto p-3">
            Mengembangkan potensi siswa melalui program-program inovatif yang dirancang untuk membentuk karakter dan
            kompetensi masa depan.
        </p>
    </div>

    <div class="relative z-10 w-[90%] xl:w-[90%] mx-auto">
        {{-- Header --}}
        <div class="flex justify-center items-end mt-10 mb-10">

            {{-- Navigasi (Sembunyi di Mobile karena biasanya swipe pakai jempol) --}}
            <div class="hidden md:flex gap-3">
                <button @click="scrollTo('prev')"
                    class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center hover:bg-blue-950 hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <button @click="scrollTo('next')"
                    class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center hover:bg-blue-950 hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Slider Container --}}
        <div class="relative -mx-6 md:mx-0"> {{-- -mx-6 agar scroll mentok ke pinggir layar di mobile --}}
            <div x-ref="slider"
                class="flex overflow-x-auto snap-x snap-mandatory gap-5 md:gap-6 no-scrollbar px-6 md:px-0 pb-10"
                style="scrollbar-width: none; -ms-overflow-style: none;">

                {{-- Loop Data Langsung dari Content Page Prestasi --}}
                @foreach ($unggulanPage->content as $block)
                    @if ($block['type'] === 'image_block')
                        <div class="flex-none w-[80%] md:w-[40%] lg:w-1/4 snap-start">
                            <div class="bg-white rounded-[2rem] overflow-hidden shadow-lg border border-gray-100 group">
                                {{-- Frame Gambar 3:4 agar sama dengan halaman prestasi --}}
                                <div class="relative aspect-[3/4] overflow-hidden">
                                    <img src="{{ asset('storage/' . $block['data']['image']) }}"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">

                                    {{-- Overlay Gradient --}}
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-blue-950/90 via-transparent to-transparent">
                                    </div>

                                    {{-- Caption di Dalam Gambar (Style App) --}}
                                    <div class="absolute bottom-0 p-6">
                                        <span
                                            class="bg-pink-600 text-white text-[10px] px-3 py-1 rounded-full uppercase tracking-widest font-bold mb-3 inline-block">
                                            Program Unggulan
                                        </span>
                                        <h3 class="text-white font-bold text-lg leading-tight line-clamp-2">
                                            {{ $block['data']['caption'] ?? 'Prestasi Siswa SPENSATA' }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                {{-- Spacer Akhir agar card terakhir tidak mentok --}}
                <div class="flex-none w-1 md:hidden"></div>
            </div>
        </div>
        {{-- --- TOMBOL LIHAT LEBIH BANYAK --- --}}
        {{-- <div class="mt-8 text-center" data-aos="fade-up">
            <a href="/prestasi"
                class="inline-flex items-center gap-2 px-8 py-3 bg-white text-blue-950 font-bold rounded-full shadow-md hover:shadow-xl hover:bg-blue-950 hover:text-white transition-all duration-300 border border-gray-100 group">
                <span>Lihat Lebih Banyak Prestasi</span>
                <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div> --}}
        {{-- --------------------------------- --}}
    </div>
</section>

<div class="relative w-full overflow-hidden leading-[0] bg-white -mt-1">
    {{-- 
        - scale-y-[-1] : Membalikkan gelombang secara vertikal (Mirror)
        - text-blue-950 : Memberikan warna biru yang sama persis dengan Hero
    --}}
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none"
        class="relative block w-[200%] h-[60px] md:h-[120px] animate-wave-slow transform scale-y-[-1] text-blue-950">

        <path
            d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
            fill="currentColor"> {{-- currentColor akan mengambil warna dari class 'text-blue-950' --}}
        </path>
    </svg>
</div>

<style>
    /* Hilangkan Scrollbar di semua browser */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
</style>
