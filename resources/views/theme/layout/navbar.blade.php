<nav x-data="{ navBg: false }" x-on:scroll.window="navBg = (window.pageYOffset > 20) ? true : false"
    :class="navBg ? 'bg-blue-900 shadow-md' : 'bg-transparent'"
    class="hidden lg:block fixed top-0 left-0 w-full h-[12vh] z-[100] transition-all duration-300">

    <div class="flex items-center h-full justify-between w-[90%] xl:w-[90%] mx-auto">

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

        {{-- Navlink Desktop --}}
        <div class="hidden lg:flex items-center space-x-10">
            @foreach ($navLinks as $link)
                @if (isset($link['child']))
                    {{-- RENDER: DROPDOWN --}}
                    <div class="relative group py-4">
                        <button
                            class="flex items-center space-x-1 text-white hover:text-pink-300 font-semibold transition-all">
                            <span>{{ $link['label'] }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        {{-- Dropdown Menu Content --}}
                        <div
                            class="absolute left-0 top-full hidden group-hover:block w-52 bg-white rounded-xl shadow-xl py-3 z-[150] border border-gray-100">
                            @foreach ($link['child'] as $sub)
                                {{-- <a href="{{ route($sub['url']) }}" --}}
                                <a href="#"
                                    class="block px-5 py-2.5 text-sm text-gray-700 hover:bg-pink-50 hover:text-pink-600 transition-colors">
                                    {{ $sub['label'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    {{-- RENDER: LINK BIASA --}}
                    <a href="{{ route($link['url']) }}"
                        class="{{ request()->routeIs($link['url']) ? 'text-pink-300' : 'text-white' }} hover:text-pink-300 font-semibold transition-all">
                        {{ $link['label'] }}
                    </a>
                @endif
            @endforeach

        </div>

        <div class="hidden lg:flex items-center space-x-4">
            @foreach ($navActions as $action)
                {{-- <a href="{{ route($action['url']) }}" --}}
                <a href="#"
                    class="inline-block px-6 py-2 {{ $action['class'] }} text-white font-semibold rounded-lg shadow-md transition duration-300">
                    {{ $action['label'] }}
                </a>
            @endforeach
        </div>

    </div>
</nav>
