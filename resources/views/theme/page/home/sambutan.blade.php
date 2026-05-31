<section class="py-16 md:py-24 bg-white relative overflow-hidden">
    {{-- Latar belakang polos bersih sesuai gambar --}}
    <div class="w-[90%] lg:w-[85%] xl:w-[75%] mx-auto relative z-10">

        {{-- List Pengumuman Container --}}
        <div class="space-y-20 md:space-y-28"> {{-- Jarak antar post dibuat renggang dan lega --}}
            @forelse ($sambutan as $item)
                {{-- Dipaksa hanya menampilkan maksimal 2 pengumuman --}}

                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-16 items-center">

                    {{-- UTALAK-ATIK ORDER KOLOM BERDASARKAN GANJIL/GENAP --}}
                    {{-- md:order-last akan memaksa gambar pindah ke kanan pada post genap (kedua) --}}
                    <div class="md:col-span-4 w-full h-auto flex justify-center" data-aos="fade-up">
                        <div
                            class="w-full max-w-[360px] aspect-square rounded-2xl overflow-hidden shadow-md border border-gray-100 bg-gray-50">
                            @if ($item->thumbnail)
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                                    class="w-full h-full object-cover">
                            @else
                                {{-- Placeholder jika kosong --}}
                                <div
                                    class="w-full h-full flex flex-col items-center justify-center text-blue-950 p-6 text-center select-none bg-blue-50 font-bold">
                                    SPENSATA INFO
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- SISI KONTEN TULISAN --}}
                    <div class="md:col-span-8 flex flex-col justify-center" data-aos="fade-up">

                        {{-- Judul Pengumuman (Menggunakan huruf kapital besar/Uppercase sesuai gambar) --}}
                        <h2
                            class="text-2xl md:text-3xl font-extrabold text-blue-950 tracking-wide uppercase leading-tight">
                            <a href="{{ url('blog/' . $item->slug) }}" class="hover:text-blue-800 transition">
                                {{ $item->title }}
                            </a>
                        </h2>

                        {{-- Deskripsi Konten Tulisan --}}
                        <p class="text-gray-700 text-sm md:text-base mt-4 leading-relaxed line-clamp-4 md:line-clamp-5">
                            {{ Str::limit(strip_tags($item->content), 280) }}
                        </p>

                        {{-- Tombol READ MORE dengan Icon Chevron (Persis seperti di gambar) --}}
                        <div class="mt-6">
                            <a href="{{ url('blog/' . $item->slug) }}"
                                class="inline-flex items-center gap-2 px-5 py-2.5 border-2 border-emerald-500 text-emerald-600 hover:bg-emerald-500 hover:text-white font-bold text-xs uppercase tracking-wider rounded-full transition duration-300 group">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor"
                                    class="w-4 h-4 transform group-hover:translate-x-1 transition duration-200">
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
