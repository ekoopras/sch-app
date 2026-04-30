<section class="py-16 md:py-24 bg-white relative overflow-hidden">
    {{-- Dekorasi Latar Belakang --}}
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-50 rounded-full blur-[120px] opacity-60"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-pink-50 rounded-full blur-[120px] opacity-60"></div>

    <div class="w-[90%] xl:w-[90%] mx-auto relative z-10">

        <div class="space-y-12">
            @foreach ($page->content as $block)
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
                            <div class="overflow-hidden rounded-3xl shadow-lg border border-gray-100">
                                <img src="{{ asset('storage/' . $block['data']['image']) }}"
                                    class="w-full h-auto object-cover">
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
                                            <div
                                                class="rounded-2xl overflow-hidden shadow-md border border-gray-50 w-full">
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
