<footer class="bg-blue-950 text-white pt-20 pb-10 overflow-hidden ">
    <div class="w-[90%] xl:w-[90%] mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">

            {{-- Kolom 1: Profil Singkat --}}
            <div class="space-y-6">
                <div class="flex items-center gap-3">
                    {{-- Ganti dengan logo sekolah --}}
                    <div class="w-12 h-12 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('logoapp.png') }}" alt="logo" class="w-full h-full object-contain">
                    </div>

                    {{-- Teks (Judul & Sub-judul) --}}
                    <div class="flex flex-col justify-center leading-tight">
                        <h1 class="text-xl md:text-2xl text-white font-bold tracking-tight">
                            SPENSATA
                        </h1>
                        <p class="text-[10px] md:text-xs text-white font-medium tracking-widest uppercase">
                            SMPN 1 TASIKMADU
                        </p>
                    </div>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Mewujudkan generasi yang unggul dalam prestasi, luhur dalam budi pekerti, dan siap menghadapi
                    tantangan global di masa depan.
                </p>
                {{-- Sosial Media --}}
                <div class="flex gap-4">
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-pink-500 transition-all duration-300">
                        <i class="fab fa-facebook-f text-sm"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-pink-500 transition-all duration-300">
                        <i class="fab fa-instagram text-sm"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-pink-500 transition-all duration-300">
                        <i class="fab fa-youtube text-sm"></i>
                    </a>
                </div>
            </div>

            {{-- Kolom 2: Navigasi Cepat --}}
            <div>
                <h4 class="text-lg font-bold mb-6 relative inline-block">
                    Tautan Cepat
                    <span class="absolute -bottom-2 left-0 w-8 h-1 bg-pink-500 rounded-full"></span>
                </h4>
                <ul class="space-y-4 text-gray-400 text-sm">
                    <li><a href="#"
                            class="hover:text-pink-400 transition-colors flex items-center gap-2"><span>&rsaquo;</span>
                            Profil Sekolah</a></li>
                    <li><a href="#"
                            class="hover:text-pink-400 transition-colors flex items-center gap-2"><span>&rsaquo;</span>
                            Program Unggulan</a></li>
                    <li><a href="#"
                            class="hover:text-pink-400 transition-colors flex items-center gap-2"><span>&rsaquo;</span>
                            Fasilitas Siswa</a></li>
                    <li><a href="#"
                            class="hover:text-pink-400 transition-colors flex items-center gap-2"><span>&rsaquo;</span>
                            Berita & Kegiatan</a></li>
                    <li><a href="#"
                            class="hover:text-pink-400 transition-colors flex items-center gap-2"><span>&rsaquo;</span>
                            PPDB Online</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Kontak --}}
            <div>
                <h4 class="text-lg font-bold mb-6 relative inline-block">
                    Hubungi Kami
                    <span class="absolute -bottom-2 left-0 w-8 h-1 bg-pink-500 rounded-full"></span>
                </h4>
                <ul class="space-y-4 text-gray-400 text-sm">
                    <li class="flex items-start gap-4">
                        <span class="text-pink-500"><i class="fas fa-map-marker-alt"></i></span>
                        <span>CWFH+83J, Kranggan, Buran, Kec. Tasikmadu, Kabupaten Karanganyar, Jawa Tengah 57722</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="text-pink-500"><i class="fas fa-phone-alt"></i></span>
                        <span>(0271) 495572</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="text-pink-500"><i class="fas fa-envelope"></i></span>
                        <span>smpn01tasikmadu@gmail.com </span>
                    </li>
                </ul>
            </div>

            {{-- Kolom 4: Jam Operasional / Map --}}
            <div>
                <h4 class="text-lg font-bold mb-6 relative inline-block">
                    Jam Layanan
                    <span class="absolute -bottom-2 left-0 w-8 h-1 bg-pink-500 rounded-full"></span>
                </h4>
                <div class="bg-white/5 p-6 rounded-2xl border border-white/10">
                    <div class="flex justify-between text-sm mb-3">
                        <span class="text-gray-400">Senin - Kamis</span>
                        <span class="text-pink-300">07:00 - 16:00</span>
                    </div>
                    <div class="flex justify-between text-sm mb-3">
                        <span class="text-gray-400">Jumat</span>
                        <span class="text-pink-300">07:00 - 11:30</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-400">Sabtu - Minggu</span>
                        <span class="text-red-400 font-medium">Libur</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Copyright --}}
        <div
            class="pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4 text-gray-500 text-xs">
            <p>&copy; {{ date('Y') }} SMP Negeri 1 Tasikmadu. All rights reserved.</p>
            <div class="flex gap-6">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
