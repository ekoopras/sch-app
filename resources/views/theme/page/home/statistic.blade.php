<section class="relative bg-gray-100 py-16 md:py-24 overflow-hidden">

    <div class="relative z-10 w-[90%] mx-auto">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">

            @foreach ($statistic as $item)
                <div class="p-6 md:p-8 bg-white border border-gray-100 rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 group"
                    data-aos="zoom-in">
                    {{-- Icon --}}
                    <div
                        class="w-12 h-12 mb-4 flex items-center justify-center rounded-2xl {{ $item['color'] == 'blue' ? 'bg-blue-50 text-blue-600' : 'bg-pink-50 text-pink-600' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="{{ $item['icon'] }}"></path>
                        </svg>
                    </div>

                    {{-- Angka --}}
                    <div class="flex items-baseline gap-1">
                        <h3 class="text-3xl md:text-4xl font-black text-blue-950">
                            {{ $item['count'] }}
                        </h3>
                        <span class="text-pink-600 font-bold">+</span>
                    </div>

                    {{-- Label --}}
                    <p class="text-gray-500 font-medium mt-1 text-sm md:text-base tracking-wide">
                        {{ $item['label'] }}
                    </p>
                </div>
            @endforeach

        </div>
    </div>
</section>
