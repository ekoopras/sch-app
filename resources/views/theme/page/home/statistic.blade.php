<section class="relative bg-white py-16 md:py-24 overflow-hidden">

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

<div class="relative w-full overflow-hidden leading-[0] bg-white -mt-1">
    {{-- 
        - scale-y-[-1] : Membalikkan gelombang secara vertikal (Mirror)
        - text-blue-950 : Memberikan warna biru yang sama persis dengan Hero
    --}}
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none"
        class="relative block w-[200%] h-[60px] md:h-[120px] animate-wave-slow transform scale-y-[-1] text-gray-100">

        <path
            d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
            fill="currentColor"> {{-- currentColor akan mengambil warna dari class 'text-blue-950' --}}
        </path>
    </svg>
</div>
