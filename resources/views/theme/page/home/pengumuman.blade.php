<section class="py-12 md:py-24 bg-white relative overflow-hidden">
    <div class="w-[92%] lg:w-[85%] xl:w-[75%] mx-auto relative z-10">

        {{-- Jarak antar post di mobile dibuat hemat (space-y-8), di desktop tetap renggang (md:space-y-28) --}}
        <div class="space-y-10 md:space-y-28">
            @forelse ($pengumuman->take(2) as $item)
                @php
                    $isEven = $loop->iteration % 2 === 0;
                @endphp

                {{-- WRAPPER UTAMA: Di HP jadi Flex-Col (Atas-Bawah ala Card), di Laptop balik jadi Grid 12 Kolom --}}
                <div class="flex flex-col md:grid md:grid-cols-12 gap-5 md:gap-16 items-stretch md:items-center border-b border-gray-100 pb-10 md:border-none md:pb-0"
                    data-aos="fade-up">

                    {{-- 1. SISI GAMBAR/THUMBNAIL --}}
                    {{-- Di HP: Lebar Full (w-full) dengan tinggi proporsional (h-48 atau aspek video 16:9) --}}
                    <div class="w-full md:col-span-4 flex justify-center {{ $isEven ? 'md:order-last' : '' }}">
                        {{-- KUNCI NYA: Kita pasang aspect-square langsung di pembungkus utama tanpa h-48 lagi --}}
                        <div
                            class="w-full aspect-square rounded-2xl overflow-hidden shadow-sm border border-gray-100 bg-gray-50">
                            @if ($item->thumbnail)
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                                    class="w-full h-full object-cover hover:scale-105 transition duration-500">
                            @else
                                <div
                                    class="w-full h-full flex items-center justify-center text-blue-950 p-4 text-center select-none bg-blue-50 text-base md:text-xl font-bold">
                                    SPENSATA
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- 2. SISI KONTEN TULISAN --}}
                    {{-- Di HP: Langsung mengalir di bawah gambar dengan padding tipis --}}
                    <div class="flex-1 md:col-span-8 flex flex-col justify-center px-1 md:px-0">

                        {{-- Judul Pengumuman: Di HP kita buat pas (text-lg) dan tebal biar tegas dibaca --}}
                        <h2
                            class="text-base sm:text-lg md:text-3xl font-black text-blue-950 tracking-wide uppercase leading-snug md:leading-tight">
                            <a href="{{ url('blog/' . $item->slug) }}" class="hover:text-blue-800 transition block">
                                {{ $item->title }}
                            </a>
                        </h2>

                        {{-- Deskripsi Konten: Sekarang kita munculkan juga di HP (2 baris tipis), di desktop tetap 4-5 baris --}}
                        <p
                            class="text-gray-600 text-xs sm:text-sm md:text-base mt-2 md:mt-4 leading-relaxed line-clamp-2 md:line-clamp-5">
                            {{ Str::limit(strip_tags($item->content), 280) }}
                        </p>

                        {{-- Tombol READ MORE / SELENGKAPNYA --}}
                        <div class="mt-4 md:mt-6">
                            {{-- TAMPILAN LAPTOP (Tombol Mewah Bulat Emerald) --}}
                            <a href="{{ url('blog/' . $item->slug) }}"
                                class="hidden md:inline-flex items-center gap-2 px-5 py-2.5 border-2 border-emerald-500 text-emerald-600 hover:bg-emerald-500 hover:text-white font-bold text-xs uppercase tracking-wider rounded-full transition duration-300 group">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor"
                                    class="w-4 h-4 transform group-hover:translate-x-1 transition duration-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </a>

                            {{-- TAMPILAN HP (Tombol Mini Menyesuaikan Gaya Laptop Agar Tetap Keren) --}}
                            <a href="{{ url('blog/' . $item->slug) }}"
                                class="md:hidden inline-flex items-center gap-2 px-4 py-2 bg-emerald-50 border border-emerald-200 text-emerald-700 font-bold text-xs uppercase tracking-wider rounded-xl transition duration-200">
                                Selengkapnya
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </a>
                        </div>

                    </div>

                </div>
            @empty
                <div class="text-center py-12 text-gray-400 italic">
                    Belum ada pengumuman resmi saat ini.
                </div>
            @endforelse
        </div>

    </div>
</section>
