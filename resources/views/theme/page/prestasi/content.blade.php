<section class="py-20 bg-white relative overflow-hidden">
    {{-- Aksen Dekoratif Latar Belakang --}}
    <div class="absolute top-0 right-0 w-80 h-80 bg-blue-50 rounded-full blur-3xl opacity-60"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-pink-50 rounded-full blur-3xl opacity-60"></div>

    <div class="w-[90%] md:w-[85%] mx-auto relative z-10">

        {{-- Header Halaman --}}
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-pink-600 font-bold tracking-[0.3em] uppercase text-xs md:text-sm">Galeri Kebanggaan</span>
            <h2 class="text-3xl md:text-5xl font-black text-blue-950 mt-4">{{ $page->title }}</h2>
            <div class="w-24 h-1.5 bg-blue-700 mt-6 mx-auto rounded-full"></div>
        </div>

        {{-- Grid 4 Kolom Statis --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
            @foreach ($page->content as $block)
                {{-- HANDLE BLOK GAMBAR --}}
                @if ($block['type'] === 'image_block')
                    <div class="flex flex-col group" data-aos="zoom-in">
                        {{-- Frame Gambar Rasio 3:4 --}}
                        <div
                            class="relative overflow-hidden rounded-[2rem] shadow-sm border-4 border-white bg-white aspect-[3/4] transition-all duration-500 group-hover:shadow-xl group-hover:-translate-y-2">
                            <img src="{{ asset('storage/' . $block['data']['image']) }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                            {{-- Overlay Halus saat Hover (Opsional) --}}
                            <div
                                class="absolute inset-0 bg-blue-950/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                        </div>

                        {{-- Keterangan Gambar di Bawah --}}
                        @if ($block['data']['caption'])
                            <div class="mt-4 px-2">
                                <h3 class="text-blue-950 font-extrabold text-sm md:text-lg leading-tight line-clamp-2">
                                    {{ $block['data']['caption'] }}
                                </h3>
                                <p
                                    class="text-pink-600 text-[10px] md:text-xs font-bold uppercase tracking-widest mt-1">
                                    Prestasi Siswa
                                </p>
                            </div>
                        @endif
                    </div>

                    {{-- HANDLE BLOK TEKS (Jika ada deskripsi tambahan, memakan baris penuh) --}}
                @elseif ($block['type'] === 'text_block')
                    <div class="col-span-full bg-gray-50 p-8 md:p-12 rounded-[3rem] border border-gray-100 mb-10"
                        data-aos="fade-up">
                        <div
                            class="flex-1 
                            [&_h1]:text-3xl [&_h1]:font-black [&_h1]:text-blue-950 [&_h1]:mb-4
                            [&_p]:text-gray-600 [&_p]:leading-relaxed [&_p]:text-lg">
                            {!! $block['data']['body'] !!}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
