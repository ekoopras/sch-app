<section class="relative bg-white py-16 md:py-24 overflow-hidden" x-data="{ shown: false }"
    x-intersect.once.margin.-100px="shown = true">

    <div class="md:px-12 w-[90%] xl:w-[90%] mx-auto">
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">

            {{-- Sisi Foto (Reveal dari Kiri) --}}
            <div class="w-full lg:w-6/12 transition-all duration-1000 ease-out transform"
                :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-12'">

                {{-- Judul Sambutan (Mobile) --}}
                <div class="mb-10 lg:hidden text-center">
                    <span class="text-pink-600 font-bold tracking-widest uppercase text-sm">Sambutan</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-blue-950 mt-2 tracking-tight">
                        Kepala Sekolah <span class="text-blue-700">SPENSATA</span>
                    </h2>
                    <div class="w-16 h-1.5 bg-pink-500 mt-4 rounded-full mx-auto pb-3"></div>
                </div>

                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-24 h-24 bg-pink-100 rounded-full -z-10"></div>
                    <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-blue-50 rounded-full -z-10"></div>

                    <div
                        class="rounded-2xl overflow-hidden shadow-xl border-8 border-white max-w-[70%] mx-auto lg:max-w-[80%] lg:mx-0">
                        <img src="{{ asset('kepala.png') }}" alt="Kepala Sekolah" class="w-full h-auto object-cover">
                    </div>
                </div>
            </div>

            {{-- Sisi Teks (Reveal dari Kanan dengan sedikit Delay) --}}
            <div class="w-full lg:w-6/12 transition-all duration-1000 ease-out transform delay-300"
                :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-12'">

                <div class="space-y-6">
                    {{-- Judul Sambutan (Desktop) --}}
                    <div class="hidden lg:block mb-8">
                        <span class="text-pink-600 font-bold tracking-widest uppercase text-sm">Sambutan</span>
                        <h2 class="text-3xl md:text-4xl font-bold text-blue-950 mt-2 tracking-tight">
                            Kepala Sekolah <span class="text-blue-700">SPENSATA</span>
                        </h2>
                        <div class="w-16 h-1.5 bg-pink-500 mt-4 rounded-full"></div>
                    </div>

                    <div class="text-gray-600 leading-relaxed text-base md:text-md space-y-4">
                        <p class="italic text-blue-900 font-medium pt-4 lg:pt-0">"Assalamu’alaikum Warahmatullahi
                            Wabarakatuh,"</p>
                        <p>
                            Puji syukur kita panjatkan ke hadirat Tuhan Yang Maha Esa. Melalui website ini, kami
                            berkomitmen untuk membuka pintu informasi selebar-lebarnya mengenai kegiatan dan prestasi di
                            SMPN 1 TASIKMADU
                        </p>
                        <p>
                            Kami percaya bahwa pendidikan adalah kunci untuk membuka masa depan. Dengan kolaborasi
                            antara guru, siswa, dan orang tua, kita wujudkan generasi yang cerdas, berakhlak mulia...
                        </p>
                    </div>

                    {{-- Nama/NIP --}}
                    <div class="pt-6 border-t border-gray-100">
                        <h4 class="text-xl font-bold text-blue-950">Nama Kepala Sekolah, M.Pd.</h4>
                        <p class="text-gray-500 text-sm tracking-widest uppercase mt-1">NIP. 192837465673849</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
