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

        <div class="space-y-12">
            @foreach ($heroPage->content as $block)
                {{-- 1. BLOK TEKS STANDAR (FULL WIDTH) --}}
                @if ($block['type'] === 'text_block')
                    <div class="max-w-[800px] mx-auto" data-aos="fade-up">
                        <div
                            class="custom-misi-content
                            [&_h1]:text-4xl [&_h1]:font-black [&_h1]:text-blue-950 [&_h1]:mb-6
                            [&_h2]:text-3xl [&_h2]:font-extrabold [&_h2]:text-blue-900 [&_h2]:mb-5
                            [&_p]:text-gray-700 [&_p]:text-lg [&_p]:leading-relaxed [&_p]:mb-6
                            [&_ul_li]:relative [&_ul_li]:pl-8 [&_ul_li]:before:content-['→'] [&_ul_li]:before:text-pink-600 [&_ul_li]:before:absolute [&_ul_li]:before:left-0">
                            {!! $block['data']['body'] !!}
                        </div>
                    </div>

                    {{-- 2. BLOK GAMBAR STANDAR (FULL WIDTH) --}}
                @elseif($block['type'] === 'image_block')
                    <div class="py-4 max-w-[900px] mx-auto" data-aos="zoom-in">
                        <figure>
                            <div class="overflow-hidden rounded-3xl">
                                <img src="{{ asset('storage/' . $block['data']['image']) }}"
                                    class="w-full h-auto object-contain" width="900" height="900">
                            </div>
                            @if ($block['data']['caption'])
                                <figcaption class="mt-4 text-center text-sm text-gray-400 italic">
                                    {{ $block['data']['caption'] }}</figcaption>
                            @endif
                        </figure>
                    </div>

                    {{-- 3. BLOK RAW HTML (FULL WIDTH) --}}
                @elseif($block['type'] === 'raw_html')
                    <div class="my-8 w-full max-w-screen-xl mx-auto" data-aos="fade-up">
                        {!! $block['data']['code'] !!}
                    </div>

                    {{-- 4. BLOK LAYOUT (KOLOM/GRID) --}}
                @elseif($block['type'] === 'layout_block')
                    <div class="py-8" data-aos="fade-up">
                        {{-- Grid Container dengan justify-center --}}
                        <div
                            class="grid grid-cols-1 md:grid-cols-{{ $block['data']['columns'] }} gap-8 lg:gap-12 justify-center items-start">

                            @foreach ($block['data']['items'] as $item)
                                {{-- Jika 1 kolom, kita batasi lebarnya agar enak dibaca --}}
                                <div
                                    class="flex flex-col gap-6 w-full mx-auto {{ $block['data']['columns'] == '1' ? 'max-w-3xl' : '' }}">

                                    @foreach ($item['column_content'] as $innerBlock)
                                        {{-- Sub-Blok Teks --}}
                                        @if ($innerBlock['type'] === 'text_block')
                                            <div
                                                class="custom-misi-content [&_p]:text-base [&_p]:leading-relaxed [&_h3]:text-xl [&_h3]:font-bold [&_h3]:text-blue-950 {{ $block['data']['columns'] == '1' ? 'text-center' : '' }}">
                                                {!! $innerBlock['data']['body'] !!}
                                            </div>

                                            {{-- Sub-Blok Gambar --}}
                                        @elseif ($innerBlock['type'] === 'image_block')
                                            <div class="rounded-2xl overflow-hidden w-full">
                                                <img src="{{ asset('storage/' . $innerBlock['data']['image']) }}"
                                                    class="w-full h-auto">
                                                @if ($innerBlock['data']['caption'])
                                                    <p class="p-3 text-xs text-center text-gray-400 bg-gray-50">
                                                        {{ $innerBlock['data']['caption'] }}</p>
                                                @endif
                                            </div>

                                            {{-- Sub-Blok HTML Kustom (Penting: Sudah masuk sini) --}}
                                        @elseif ($innerBlock['type'] === 'raw_html')
                                            <div class="w-full">
                                                {!! $innerBlock['data']['code'] !!}
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            @endforeach

                        </div>
                    </div>
                @endif
            @endforeach
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
