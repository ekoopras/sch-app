<section
    class="relative bg-blue-950 w-full min-h-[40vh] md:min-h-[50vh] flex items-center justify-center pt-[15vh] overflow-hidden">



    <div class="w-[90%] md:w-[85%] mx-auto z-10">
        {{-- Mengubah grid menjadi flex col dan items-center --}}
        <div class="flex flex-col items-center justify-center">

            {{-- Text Content dengan text-center --}}
            <div data-aos="fade-up" class="text-center flex flex-col items-center">

                {{-- Breadcrumb Dinamis (justify-center agar listnya di tengah) --}}
                <nav
                    class="flex items-center justify-center gap-2 text-pink-500 mb-6 font-semibold tracking-widest uppercase text-[10px] md:text-xs">
                    <a href="/" class="hover:text-pink-400 transition-colors">Beranda</a>
                    <span class="text-gray-600">/</span>
                    <span class="text-white">{{ $page->title }}</span>
                </nav>

                {{-- Judul Halaman --}}
                <div class="relative inline-block">
                    <h1 class="text-4xl md:text-7xl font-black text-white leading-tight md:leading-[1.1] relative z-10">
                        {{ $page->title }}
                    </h1>
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
