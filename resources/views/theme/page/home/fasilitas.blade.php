<section class="relative w-full bg-blue-950 py-16 md:py-24 overflow-hidden" x-data="{
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
        <h2 class="text-3xl md:text-4xl font-bold text-white">Fasilitas <span class="text-pink-600">Sekolah</span>
        </h2>
        <div class="w-24 h-1.5 bg-blue-950 mx-auto mt-4 rounded-full"></div>
        <p class="text-white mt-6 max-w-2xl mx-auto p-3">
            Kami menyediakan lingkungan belajar yang nyaman dengan berbagai fasilitas terbaik untuk mendukung tumbuh
            kembang siswa secara optimal.
        </p>
    </div>

    <div class="absolute inset-0 z-0 opacity-30 pointer-events-none">

        {{-- Bola 1 (Kiri Atas, Pink Terang, Solid) --}}
        <div class="absolute top-20 left-10 md:left-20 w-32 h-32 md:w-48 md:h-48 rounded-full bg-pink-400">
        </div>

        {{-- Bola 2 (Kanan Bawah, Biru Muda Terang, Solid) --}}
        <div class="absolute bottom-20 right-10 md:right-20 w-40 h-40 md:w-60 md:h-60 rounded-full bg-cyan-300">
        </div>
    </div>

    <div class="relative z-10 w-[90%] xl:w-[90%] mx-auto">
        {{-- Header --}}
        <div class="flex justify-center items-end mt-10 mb-10">

            {{-- Navigasi (Sembunyi di Mobile karena biasanya swipe pakai jempol) --}}
            <div class="hidden md:flex gap-3">
                <button @click="scrollTo('prev')"
                    class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center hover:bg-blue-950 transition-all">
                    <svg class="w-5 h-5 text-white hover:text-pink-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <button @click="scrollTo('next')"
                    class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center hover:bg-blue-950 hover:text-white transition-all">
                    <svg class="w-5 h-5 text-white hover:text-pink-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
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

                <template x-for="(slide, index) in slides" :key="index">
                    {{-- 
                        MOBILE: w-[85%] (Memberikan efek Peek/intip gambar sebelah)
                        DESKTOP: lg:w-1/4 (Tetap 4 kolom)
                    --}}
                    <div class="flex-none w-[85%] md:w-[45%] lg:w-1/4 snap-start">
                        <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-pink-400 group">
                            {{-- Foto --}}
                            <div class="relative h-[500px] md:h-[400px] md:aspect-square overflow-hidden">
                                <img :src="'{{ asset('') }}' + slide.img"
                                    class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">

                                {{-- Overlay Gradient ala App --}}
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent">
                                </div>

                                {{-- Text di dalam gambar agar makin mirip App --}}
                                <div class="absolute bottom-0 p-6">
                                    <span
                                        class="bg-white/20 backdrop-blur-md text-white text-[10px] px-3 py-1 rounded-full uppercase tracking-widest font-bold mb-2 inline-block"
                                        x-text="slide.tingkat"></span>
                                    <h3 class="text-white font-bold text-lg leading-tight" x-text="slide.title"></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                {{-- Spacer Akhir agar card terakhir tidak mentok --}}
                <div class="flex-none w-1 md:hidden"></div>
            </div>
        </div>

    </div>
</section>

<div class="relative w-full overflow-hidden leading-[0] bg-blue-950 -mt-1">
    {{-- 
        - scale-y-[-1] : Membalikkan gelombang secara vertikal (Mirror)
        - text-blue-950 : Memberikan warna biru yang sama persis dengan Hero
    --}}
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none"
        class="relative block w-[200%] h-[60px] md:h-[120px] animate-wave-slow transform scale-y-[-1] text-white">

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
