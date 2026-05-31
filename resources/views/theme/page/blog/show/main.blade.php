<article class="bg-white overflow-hidden" data-aos="fade-up">

    <div class="">
        {{-- 1. Meta Data (Breadcrumb & Badge Kategori Sejajar Rata) --}}
        {{-- PEMBUNGKUS BARU: Diubah jadi flex-col (atas-bawah) dengan items-start agar rata kiri --}}
        <div class="flex flex-col gap-2.5 mb-6 border-b border-gray-100 pb-4">

            {{-- BARIS ATAS: Badge Kategori Sesuai Tema Hijau SPENSATA --}}
            <div>
                <span
                    class="inline-flex items-center bg-[#149464] text-white px-3 py-1 rounded-lg font-extrabold uppercase tracking-wider text-[10px] shadow-sm shadow-[#149464]/10">
                    {{ $post->category->name ?? 'Berita' }}
                </span>
            </div>

            {{-- BARIS BAWAH: Navigasi Breadcrumb --}}
            <nav class="flex flex-wrap items-center gap-2 text-pink-500 font-bold tracking-widest uppercase text-[11px]">
                <a href="{{ url('/') }}" class="hover:text-blue-950 transition-colors">Home</a>
                <span class="text-gray-300 font-medium">/</span>

                <a href="{{ url('/blog') }}" class="hover:text-blue-950 transition-colors">Blog</a>
                <span class="text-gray-300 font-medium">/</span>

                {{-- Judul Artikel (Text-gray-400, Normal-case agar tidak pusing dibaca) --}}
                <span
                    class="text-gray-400 font-medium normal-case tracking-normal max-w-[240px] sm:max-w-[400px] truncate"
                    title="{{ $post->title }}">
                    {{ $post->title }}
                </span>
            </nav>

        </div>

        {{-- Mengunci line-height secara paksa sebesar 1.5 atau 1.6 agar spasi vertikalnya merenggang sempurna --}}
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight mb-10"
            style="line-height: 1.2 !important;">
            {{ $post->title }}
        </h1>

        {{-- 3. Gambar Utama (Thumbnail) --}}
        @if ($post->thumbnail)
            <div class="aspect-video w-full overflow-hidden rounded-3xl mb-10 shadow-lg">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" class="w-full h-full object-cover"
                    alt="{{ $post->title }}">
            </div>
        @endif

        {{-- 4. ISI KONTEN --}}
        {{-- 4. ISI KONTEN --}}
        <div
            class="custom-misi-content prose lg:prose-xl max-w-none 
    [&_p]:text-gray-700 [&_p]:leading-relaxed [&_p]:mb-6
    [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:text-blue-900 [&_h2]:mt-8
    [&_ul_li]:relative [&_ul_li]:pl-8 [&_ul_li]:before:content-['→'] [&_ul_li]:before:text-pink-600 [&_ul_li]:before:absolute [&_ul_li]:before:left-0
    
    {{-- MEMAKSA GAMBAR DI TENGAH-TENGAH CENTER --}}
    [&_img]:mx-auto [&_img]:my-8 [&_img]:block [&_img]:rounded-2xl [&_img]:shadow-md
    
    {{-- MENYEMBUNYIKAN TOTAL SEMUA TEKS METADATA BAWAAN FILAMENT / TRIX --}}
    [&_figcaption]:hidden 
    [&_.attachment__metadata]:hidden 
    [&_.attachment__caption]:hidden 
    [&_span.attachment__name]:hidden 
    [&_span.attachment__size]:hidden 
    [&_.attachment-wrapper_span]:hidden">

            {{-- Render langsung tanpa Regex agar tag <img> asli tidak rusak --}}
            {!! $post->content !!}

        </div>

        {{-- 5. Tag Artikel --}}
        @if ($post->tags)
            <div class="mt-10 pt-10 border-t border-gray-100 flex flex-wrap gap-2">
                @foreach ($post->tags as $tag)
                    <span class="bg-gray-100 text-gray-600 px-4 py-1 rounded-full text-xs font-medium italic">
                        #{{ $tag }}
                    </span>
                @endforeach
            </div>
        @endif
    </div>
</article>
