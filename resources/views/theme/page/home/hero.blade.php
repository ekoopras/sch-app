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

    <div class="w-[90%] xl:w-[90%] mx-auto relative z-10">

        {{-- Gunakan Grid System Tailwind: Teks di Kiri (Lebar 7 Kolom), Sisi Kanan (Bisa buat Foto Sekolah Besok/Lebar 5 Kolom) --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

            {{-- SISI KIRI: Blok Teks Manual Kebanggaanmu (data-aos diaktifkan kembali biar ada animasi smooth) --}}
            <div class="lg:col-span-6 space-y-6 text-left" data-aos="fade-right" data-aos-duration="1000">

                {{-- Sub-Headline / Salam Pembuka --}}
                <p class="text-xs sm:text-sm md:text-base font-extrabold text-pink-400 tracking-widest uppercase">
                    SELAMAT DATANG DI SMPN 1 TASIKMADU
                </p>

                {{-- Headline Utama dengan Variasi Warna Kuning --}}
                <h1
                    class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-black text-white leading-tight sm:leading-snug md:leading-tight">
                    Membentuk Generasi
                    <span class="text-yellow-300 block sm:inline-block mt-1 sm:mt-0">Unggul, Berkarakter, dan Siap Masa
                        Depan</span>
                </h1>

                {{-- Deskripsi Singkat Sekolah (Diberi Batasan Lebar max-w agar baris kalimat tidak terlalu panjang ke kanan) --}}
                <p class="text-sm sm:text-base md:text-lg font-medium text-gray-300/90 leading-relaxed max-w-2xl">
                    Sekolah kami berkomitmen memberikan pendidikan berkualitas dengan lingkungan yang inspiratif,
                    inovatif, dan berlandaskan nilai-nilai karakter.
                </p>

            </div>

            {{-- SISI KANAN: Tempat Menaruh Foto Sekolah atau Maskot (Sudah Aktif Menggunakan Tag IMG) --}}
            <div class="lg:col-span-6 lg:block" data-aos="fade-left" data-aos-duration="1000">
                <img src="{{ asset('benner.png') }}" alt="Logo SMPN 1 Tasikmadu">
            </div>

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