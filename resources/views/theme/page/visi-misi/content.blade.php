<section class="py-20 bg-white relative overflow-hidden">
    {{-- Dekorasi Latar Belakang --}}
    <div class="absolute top-0 right-0 w-80 h-80 bg-blue-50 rounded-full blur-3xl opacity-60"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-pink-50 rounded-full blur-3xl opacity-60"></div>

    <div class="w-[90%] md:w-[80%] lg:w-[60%] mx-auto relative z-10">

        {{-- Header Halaman --}}
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-pink-600 font-bold tracking-[0.3em] uppercase text-sm">Informasi Terkini</span>
            <h2 class="text-3xl md:text-5xl font-black text-blue-950 mt-4">{{ $page->title }}</h2>
            <div class="w-24 h-1.5 bg-blue-700 mt-6 mx-auto rounded-full"></div>
        </div>

        {{-- Container Kartu Atas Bawah --}}
        <div class="flex flex-col gap-8">
            @foreach ($page->content as $block)
                {{-- BLOK TEKS --}}
                @if ($block['type'] === 'text_block')
                    <div class="bg-white p-8 md:p-10 rounded-[2.5rem] shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-500 w-full"
                        data-aos="fade-up">
                        <div class="flex items-start gap-6">

                            {{-- KONTEN DENGAN STYLING MURNI TAILWIND --}}
                            <div
                                class="custom-misi-content flex-1 
                                [&_h1]:text-3xl [&_h1]:font-black [&_h1]:text-blue-950 [&_h1]:mb-4
                                [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:text-blue-900 [&_h2]:mb-3
                                [&_h3]:text-xl [&_h3]:font-bold [&_h3]:text-blue-800 [&_h3]:mb-2
                                [&_p]:text-gray-600 [&_p]:leading-relaxed [&_p]:mb-4
                                [&_ul]:list-none [&_ul]:space-y-3 [&_ul]:mb-4
                                [&_ul_li]:relative [&_ul_li]:pl-6 [&_ul_li]:text-gray-600
                                [&_ul_li]:before:content-['•'] [&_ul_li]:before:text-pink-600 [&_ul_li]:before:font-black [&_ul_li]:before:text-xl [&_ul_li]:before:absolute [&_ul_li]:before:left-0 [&_ul_li]:before:-top-1">
                                {!! $block['data']['body'] !!}
                            </div>
                        </div>
                    </div>

                    {{-- BLOK GAMBAR --}}
                @elseif($block['type'] === 'image_block')
                    <div class="my-6" data-aos="zoom-in">
                        <div
                            class="relative overflow-hidden rounded-[2.5rem] shadow-2xl border-4 border-white bg-white">
                            <img src="{{ asset('storage/' . $block['data']['image']) }}"
                                class="w-full h-auto object-cover">
                            @if ($block['data']['caption'])
                                <div class="p-4 text-center text-gray-500 italic text-sm border-t border-gray-100">
                                    {{ $block['data']['caption'] }}
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
