<section
    class="relative bg-blue-950 w-full min-h-[60vh] md:min-h-[50vh] flex items-center justify-center pt-[15vh] overflow-hidden">

    {{-- Aksen Dekoratif --}}
    <div class="absolute inset-0 z-0 opacity-30 pointer-events-none">
        {{-- Cahaya Terang (Glow Effects) --}}
        <div class="absolute -top-10 -left-10 w-64 h-64 bg-pink-500 rounded-full blur-[80px]"></div>
        <div class="absolute top-1/2 -right-20 w-80 h-80 bg-blue-400 rounded-full blur-[100px]"></div>

        {{-- Elemen Geometris Floating --}}
        <div
            class="absolute top-20 left-10 md:left-20 w-24 h-24 md:w-32 md:h-32 rounded-full bg-pink-400/10 border border-pink-400/20">
        </div>
        <div
            class="absolute bottom-20 right-10 md:right-40 w-32 h-32 md:w-48 md:h-48 rounded-full bg-cyan-300/5 border border-cyan-300/10">
        </div>
    </div>

    <div class="w-[90%] md:w-[85%] mx-auto z-10">
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-12 items-center">

            {{-- Text Content --}}
            <div data-aos="fade-right">
                {{-- Breadcrumb Dinamis --}}
                <nav
                    class="flex items-center gap-2 text-pink-500 mb-6 font-semibold tracking-widest uppercase text-[10px] md:text-xs">
                    <a href="/" class="hover:text-pink-400 transition-colors">Beranda</a>
                    <span class="text-gray-600">/</span>
                    <span class="text-white">Galeri Prestasi</span>
                </nav>

                <h1 class="text-4xl md:text-7xl font-black text-white leading-tight md:leading-[1.1]">
                    Etalase <br>
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-yellow-500">Kebanggaan</span>
                </h1>

                <p class="text-blue-100/70 mt-6 text-base md:text-xl max-w-xl leading-relaxed">
                    Dedikasi, kerja keras, dan semangat pantang menyerah keluarga besar SMPN 1 Tasikmadu dalam mengukir
                    sejarah dan prestasi.
                </p>

                {{-- Badge Counter Sederhana (Opsional) --}}
                <div class="flex gap-6 mt-10 items-center">
                    <div class="flex flex-col">
                        <span class="text-2xl md:text-3xl font-bold text-white">100+</span>
                        <span class="text-xs text-blue-300 uppercase tracking-tighter">Piala</span>
                    </div>
                    <div class="w-px h-10 bg-white/10"></div>
                    <div class="flex flex-col">
                        <span class="text-2xl md:text-3xl font-bold text-white">Prestasi</span>
                        <span class="text-xs text-blue-300 uppercase tracking-tighter">Nasional & Daerah</span>
                    </div>
                </div>
            </div>

            {{-- Ilustrasi Trophy Animasi --}}
            <div class="hidden xl:flex justify-end" data-aos="fade-left">
                <div class="relative">
                    {{-- Efek Putaran Orbit --}}
                    <div
                        class="w-80 h-80 border-2 border-white/5 rounded-full flex items-center justify-center animate-[spin_10s_linear_infinite]">
                        <div class="absolute -top-3 left-1/2 w-6 h-6 bg-pink-500 rounded-full blur-md"></div>
                        <div class="w-64 h-64 border border-pink-500/10 rounded-full"></div>
                    </div>

                    {{-- Icon Tengah --}}
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="p-8 bg-white/5 backdrop-blur-xl rounded-full border border-white/10 shadow-2xl">
                            <svg class="w-24 h-24 text-yellow-400 drop-shadow-[0_0_15px_rgba(250,204,21,0.5)]"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </div>
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
