<section
    class="relative bg-blue-950 w-full min-h-[60vh] md:min-h-[40vh] flex items-center justify-center pt-[15vh] overflow-hidden">

    {{-- Aksen Dekoratif --}}
    <div class="absolute inset-0 z-0 opacity-30 pointer-events-none">
        {{-- Bola Statis 1 (Kiri Atas) --}}
        <div class="absolute -top-10 -left-10 w-64 h-64 bg-pink-500 rounded-full blur-[80px]"></div>

        {{-- Bola Statis 2 (Kanan Tengah) --}}
        <div class="absolute top-1/2 -right-20 w-80 h-80 bg-blue-400 rounded-full blur-[100px]"></div>

        {{-- Bola Solid (Iconic Hero) --}}
        <div
            class="absolute top-20 left-10 md:left-20 w-24 h-24 md:w-32 md:h-32 rounded-full bg-pink-400/20 border border-pink-400/30">
        </div>
        <div
            class="absolute bottom-20 right-10 md:right-40 w-32 h-32 md:w-48 md:h-48 rounded-full bg-cyan-300/10 border border-cyan-300/20">
        </div>
    </div>

    <div class="w-[90%] md:w-[90%] mx-auto z-10">
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-10 items-center">

            {{-- Text Content --}}
            <div data-aos="fade-right">
                {{-- Breadcrumb Kecil --}}
                <nav class="flex items-center gap-2 text-pink-500 mb-6 font-semibold tracking-widest uppercase text-xs">
                    <a href="/" class="hover:text-white transition-colors">Beranda</a>
                    <span class="text-gray-500">/</span>
                    <span class="text-white">{{ $page->title }}</span>
                </nav>

                <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight md:leading-[1.1]">
                    Arah Melangkah, <br>
                    <span class="text-yellow-300">Wujudkan Cita-Cita</span>
                </h1>

                <p class="text-blue-100/80 mt-6 text-lg max-w-xl leading-relaxed">
                    Mengenal lebih dekat landasan filosofis dan tujuan besar SMPN 1 Tasikmadu dalam mencetak generasi
                    unggul yang berakhlak mulia.
                </p>
            </div>

            {{-- Ilustrasi atau Aksen Kanan (Optional) --}}
            <div class="hidden xl:flex justify-end" data-aos="fade-left">
                <div class="relative">
                    <div
                        class="w-72 h-72 border-2 border-white/10 rounded-full flex items-center justify-center animate-spin-slow">
                        <div class="w-56 h-56 border-2 border-pink-500/20 rounded-full"></div>
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-32 h-32 text-yellow-300 opacity-20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L4.5 20.29l.71.71L12 18l6.79 3 .71-.71z" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

{{-- Section Wave Divider --}}
<div class="relative w-full overflow-hidden leading-[0] bg-blue-950 -mt-1">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none"
        class="relative block w-[200%] h-[60px] md:h-[120px] transform scale-y-[-1] text-white">
        <path
            d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
            fill="currentColor">
        </path>
    </svg>
</div>
