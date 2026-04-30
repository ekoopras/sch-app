<section class="py-20 bg-white relative overflow-hidden">
    {{-- Dekorasi Latar Belakang --}}
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-50 rounded-full blur-3xl opacity-60"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-pink-50 rounded-full blur-3xl opacity-60"></div>

    <div class="w-[90%] md:w-[85%] mx-auto relative z-10">

        {{-- Header Halaman --}}
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-pink-600 font-bold tracking-[0.3em] uppercase text-sm">Hubungi Kami</span>
            <h2 class="text-3xl md:text-5xl font-black text-blue-950 mt-4">Mari Tetap Terhubung</h2>
            <div class="w-24 h-1.5 bg-blue-700 mt-6 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

            {{-- KOLOM KIRI: Informasi & Sosmed (5 Kolom) --}}
            <div class="lg:col-span-5 space-y-8" data-aos="fade-right">

                {{-- Alamat & Kontak Utama --}}
                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100">
                    <h3 class="text-2xl font-black text-blue-950 mb-6">Informasi Sekolah</h3>

                    <div class="space-y-6">
                        {{-- Alamat --}}
                        <div class="flex gap-4">
                            <div
                                class="w-12 h-12 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600 shrink-0">
                                <span class="material-symbols-outlined">location_on</span>
                            </div>
                            <div>
                                <p class="font-bold text-blue-950">Alamat Sekolah</p>
                                <p class="text-gray-500 leading-relaxed">Jl. Raya Tasikmadu, Ngawi, East Java, Indonesia
                                </p>
                            </div>
                        </div>

                        {{-- WhatsApp --}}
                        <a href="https://wa.me/628123456789" target="_blank" class="flex gap-4 group">
                            <div
                                class="w-12 h-12 rounded-2xl bg-green-50 flex items-center justify-center text-green-600 shrink-0 group-hover:bg-green-600 group-hover:text-white transition-all">
                                <span class="material-symbols-outlined">chat</span>
                            </div>
                            <div>
                                <p class="font-bold text-blue-950">WhatsApp Admin</p>
                                <p class="text-gray-500">+62 812-3456-789</p>
                            </div>
                        </a>

                        {{-- Email --}}
                        <a href="mailto:info@smpn1tasikmadu.sch.id" class="flex gap-4 group">
                            <div
                                class="w-12 h-12 rounded-2xl bg-pink-50 flex items-center justify-center text-pink-600 shrink-0 group-hover:bg-pink-600 group-hover:text-white transition-all">
                                <span class="material-symbols-outlined">mail</span>
                            </div>
                            <div>
                                <p class="font-bold text-blue-950">Email Resmi</p>
                                <p class="text-gray-500 text-sm md:text-base">info@smpn1tasikmadu.sch.id</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Media Sosial Grid --}}
                <div class="grid grid-cols-2 gap-4">
                    {{-- Instagram --}}
                    <a href="#"
                        class="bg-gradient-to-br from-purple-600 to-pink-500 p-6 rounded-[2rem] text-white hover:scale-105 transition-transform">
                        <i class="fab fa-instagram text-3xl mb-3 block"></i>
                        <p class="font-bold">Instagram</p>
                        <p class="text-xs opacity-80">@spensata_official</p>
                    </a>
                    {{-- TikTok --}}
                    <a href="#"
                        class="bg-black p-6 rounded-[2rem] text-white hover:scale-105 transition-transform">
                        <i class="fab fa-tiktok text-3xl mb-3 block"></i>
                        <p class="font-bold">TikTok</p>
                        <p class="text-xs opacity-80">@spensata_ngawi</p>
                    </a>
                    {{-- YouTube --}}
                    <a href="#"
                        class="bg-red-600 p-6 rounded-[2rem] text-white hover:scale-105 transition-transform">
                        <i class="fab fa-youtube text-3xl mb-3 block"></i>
                        <p class="font-bold">YouTube</p>
                        <p class="text-xs opacity-80">SPENSATA TV</p>
                    </a>
                    {{-- Facebook --}}
                    <a href="#"
                        class="bg-blue-700 p-6 rounded-[2rem] text-white hover:scale-105 transition-transform">
                        <i class="fab fa-facebook text-3xl mb-3 block"></i>
                        <p class="font-bold">Facebook</p>
                        <p class="text-xs opacity-80">SMPN 1 Tasikmadu</p>
                    </a>
                </div>
            </div>

            {{-- KOLOM KANAN: G-Map (7 Kolom) --}}
            <div class="lg:col-span-7 h-full" data-aos="fade-left">
                <div
                    class="relative w-full h-[400px] lg:h-full min-h-[500px] rounded-[3rem] overflow-hidden shadow-2xl border-8 border-white bg-white">
                    {{-- Ganti URL Embed Google Maps sesuai lokasi asli sekolah --}}
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126615.11585868846!2d111.36531984335938!3d-7.407284699999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79ed7b34e5659d%3A0x7d0a20721867c46a!2sSMP%20Negeri%201%20Tasikmadu!5e0!3m2!1sid!2sid!4v1714312345678!5m2!1sid!2sid"
                        class="absolute inset-0 w-full h-full border-0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>
    </div>
</section>
