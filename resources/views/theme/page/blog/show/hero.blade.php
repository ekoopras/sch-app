<section
    class="relative bg-blue-900 w-full min-h-[60vh] md:min-h-[20vh] flex items-center justify-center pt-[15vh] overflow-hidden">

    <div class="w-[90%] md:w-[90%] mx-auto z-10">
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-10 items-center">

            {{-- Text Content --}}
            <div data-aos="fade-right">
                {{-- Breadcrumb Kecil --}}
                <nav class="flex items-center gap-2 text-pink-500 mb-6 font-semibold tracking-widest uppercase text-xs">
                    <a href="/" class="hover:text-white transition-colors">blog</a>
                    <span class="text-gray-500">/</span>
                    <span class="text-white">{{ $post->title }}</span>
                </nav>

            </div>

        </div>
    </div>

</section>
