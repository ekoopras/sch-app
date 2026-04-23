<section class="relative bg-blue-950 w-full min-h-screen flex items-center justify-center pt-[12vh] overflow-hidden">

    <div class="absolute inset-0 z-0 opacity-30 pointer-events-none">

        {{-- Bola 1 (Kiri Atas, Pink Terang, Solid) --}}
        <div
            class="absolute top-20 left-10 md:left-20 w-32 h-32 md:w-48 md:h-48 rounded-full bg-pink-400 animate-up-down">
        </div>

        {{-- Bola 2 (Kanan Bawah, Biru Muda Terang, Solid) --}}
        <div
            class="absolute bottom-20 right-10 md:right-20 w-40 h-40 md:w-60 md:h-60 rounded-full bg-cyan-300 animate-up-down animation-delay-3000">
        </div>
    </div>

    <div class="w-[90%] md:w-[90%] mx-auto items-center grid grid-cols-1 xl:grid-cols-2 gap-10 z-10">

        {{-- Text Content --}}


        <div class="">
            <p class="text-sm sm:text-base md:text-xl font-bold text-white">
                SELAMAT DATANG DI SMPN 1 TASIKMADU
            </p>
            <h1
                class="text-4xl md:text-5xl lg:text-5xl mt-6 mb-6 font-bold text-white leading-[2.5rem] md:leading-[4rem]">
                Membentuk Generasi
                <span class="text-yellow-300">Unggul, Berkarakter, dan Siap Masa Depan</span>

            </h1>
            <p class="text-sm sm:text-base font-medium md:text-md text-gray-300">
                Sekolah kami berkomitmen memberikan pendidikan berkualitas dengan lingkungan yang inspiratif, inovatif,
                dan berlandaskan nilai-nilai karakter.
            </p>

            <div class="mt-8 flex items-center space-x-4">
                <a href="#"
                    class="px-8 py-3 bg-pink-500 text-white font-semibold rounded-lg hover:bg-pink-600 transition duration-300">
                    Get Started
                </a>
            </div>

        </div>

        {{-- Image Content --}}
        <div class="mx-auto" data-aos="fade-left">
            {{-- Gunakan asset() untuk memanggil gambar dari folder public --}}
            <img src="{{ asset('hero.png') }}" alt="Hero Image" width="900" height="900"
                class="w-full h-auto object-contain">
        </div>


    </div>

</section>

{{-- Section Wave Divider --}}
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
