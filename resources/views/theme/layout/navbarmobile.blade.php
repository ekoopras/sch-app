<div x-data="{ open: false }" class="lg:hidden">
    {{-- Header Mobile (Selalu Muncul) --}}
    <nav x-data="{ navBg: false }" x-on:scroll.window="navBg = (window.pageYOffset > 20) ? true : false"
        :class="navBg ? 'bg-blue-900 shadow-md' : 'bg-transparent'"
        class="fixed top-0 left-0 w-full h-[10vh] z-[150] transition-all duration-300 px-5 flex items-center justify-between">

        {{-- Logo & Brand --}}
        {{-- logo --}}
        <div class="flex items-center space-x-3">
            {{-- Logo --}}
            <div class="w-12 h-12 flex items-center justify-center overflow-hidden">
                <img src="{{ asset('logoapp.png') }}" alt="logo" class="w-full h-full object-contain">
            </div>

            {{-- Teks (Judul & Sub-judul) --}}
            <div class="flex flex-col justify-center leading-tight">
                <h1 class="text-xl md:text-2xl text-white font-bold tracking-tight">
                    SPENSATA
                </h1>
                <p class="text-[10px] md:text-xs text-white font-medium tracking-widest uppercase">
                    SMPN 1 TASIKMADU
                </p>
            </div>
        </div>

        {{-- Hamburger Button --}}
        <button @click="open = !open"
            class="text-white focus:outline-none p-2 relative z-[160] transition-transform duration-300"
            :class="open ? 'rotate-90' : ''">

            {{-- Ikon Hamburger (Garis 3) --}}
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>

            {{-- Ikon Close (X) --}}
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" x-cloak>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </nav>

    {{-- Fullscreen Menu Overlay --}}
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-x-full" x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-0 translate-x-full"
        class="fixed inset-0 bg-blue-950 z-[140] flex flex-col justify-start pt-24 px-10 overflow-y-auto"
        style="display: none;">

        <div class="flex flex-col space-y-6">
            @foreach ($navLinks as $link)
                @if (isset($link['child']))
                    {{-- Accordion untuk Dropdown di Mobile --}}
                    <div x-data="{ subOpen: false }">
                        <button @click="subOpen = !subOpen"
                            class="flex items-center justify-between w-full text-2xl font-bold text-white">
                            <span>{{ $link['label'] }}</span>
                            <svg :class="subOpen ? 'rotate-180' : ''" class="w-6 h-6 transition-transform text-pink-500"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="subOpen" x-collapse class="mt-4 ml-4 space-y-4 border-l-2 border-pink-500/30 pl-4">
                            @foreach ($link['child'] as $sub)
                                {{-- <a href="{{ route($sub['url']) }}" --}}
                                <a href="#" class="block text-lg text-gray-300 hover:text-pink-300">
                                    {{ $sub['label'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    {{-- <a href="{{ route($link['url']) }}" --}}
                    <a href="#"
                        class="text-2xl font-bold {{ request()->routeIs($link['url']) ? 'text-pink-400' : 'text-white' }}">
                        {{ $link['label'] }}
                    </a>
                @endif
            @endforeach

            <hr class="border-white/10 my-4">

            {{-- Tombol Aksi di Mobile --}}
            @foreach ($navActions as $action)
                {{-- <a href="{{ route($action['url']) }}" --}}
                <a href="#"
                    class="w-full py-4 rounded-xl text-center font-bold text-white shadow-lg {{ $action['class'] }}">
                    {{ $action['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</div>
