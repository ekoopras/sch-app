@php
    $isHome = request()->is('/');
@endphp

<div x-data="{ open: false }" class="lg:hidden">
    {{-- Header Mobile (Selalu Muncul) --}}
    <nav x-data="{
        navBg: false,
        isHome: {{ request()->is('/') ? 'true' : 'false' }}
    }" x-on:scroll.window="navBg = (window.pageYOffset > 20) ? true : false"
        :class="(isHome && !navBg) ? 'bg-transparent' : 'bg-blue-900 shadow-md'"
        class="lg:hidden fixed top-0 left-0 w-full h-[10vh] z-[150] transition-all duration-300 px-5 flex items-center justify-between">

        {{-- logo --}}
        <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
            {{-- Logo --}}
            <div
                class="w-12 h-12 flex items-center justify-center overflow-hidden transition-transform group-hover:scale-105">
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
        </a>

        {{-- Hamburger Button --}}
        <button @click="open = !open"
            class="text-white focus:outline-none p-2 relative z-[160] transition-transform duration-300"
            :class="open ? 'rotate-90' : ''">

            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>

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

        <div class="flex flex-col space-y-6 pb-10">
            @foreach ($customNavbar as $link) {{-- Sesuaikan nama variabel dengan yang dikirim dari AppServiceProvider --}}

                {{-- 1. RENDER JIKA MENU UTAMA ADALAH DROPDOWN --}}
                @if (isset($link['is_dropdown']) && $link['is_dropdown'])
                    {{-- Accordion untuk Dropdown di Mobile --}}
                    <div x-data="{ subOpen: false }" class="py-2">
                        <button @click="subOpen = !subOpen"
                            class="flex items-center justify-between w-full text-2xl font-bold text-white focus:outline-none">
                            <span>{{ $link['label'] }}</span>
                            <svg :class="subOpen ? 'rotate-180' : ''" class="w-6 h-6 transition-transform text-pink-500"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        {{-- Isi Anak Menu Dropdown --}}
                        <div x-show="subOpen" x-transition
                            class="mt-4 ml-4 space-y-4 border-l-2 border-pink-500/30 pl-4">

                            @if (isset($link['children']) && is_array($link['children']))
                                @foreach ($link['children'] as $sub)
                                    @php
                                        // Mengurai arah URL anak menu secara dinamis untuk mobile
                                        $subUrl = '#';
                                        if ($sub['type'] === 'url') {
                                            $subUrl = url($sub['url']);
                                        } elseif ($sub['type'] === 'page') {
                                            $subUrl = url('page/' . $sub['page_slug']);
                                        } elseif ($sub['type'] === 'category') {
                                            $subUrl = !empty($sub['post_slug'])
                                                ? url('blog/' . $sub['post_slug'])
                                                : url('blog?category=' . $sub['category_slug']);
                                        }
                                    @endphp

                                    <a href="{{ $subUrl }}"
                                        class="block text-lg text-gray-300 hover:text-pink-300 transition-colors font-medium">
                                        {{ $sub['label'] }}
                                    </a>
                                @endforeach
                            @endif

                        </div>
                    </div>

                    {{-- 2. RENDER JIKA MENU UTAMA ADALAH LINK BIASA --}}
                @else
                    @php
                        // Mengurai arah URL menu utama secara dinamis
                        $targetUrl = '#';
                        if ($link['type'] === 'url') {
                            $targetUrl = url($link['url']);
                        } elseif ($link['type'] === 'page') {
                            $targetUrl = url('page/' . $link['page_slug']);
                        } elseif ($link['type'] === 'category') {
                            $targetUrl = !empty($link['post_slug'])
                                ? url('blog/' . $link['post_slug'])
                                : url('blog?category=' . $link['category_slug']);
                        }
                    @endphp

                    <div class="py-2">
                        <a href="{{ $targetUrl }}"
                            class="text-2xl font-bold block {{ request()->is(ltrim($targetUrl, url('/'))) ? 'text-pink-400' : 'text-white' }} hover:text-pink-300 transition-colors">
                            {{ $link['label'] }}
                        </a>
                    </div>
                @endif

            @endforeach

            <hr class="border-white/10 my-4">

            {{-- Tombol Aksi di Mobile --}}
            <div class="flex flex-col space-y-4">
                @foreach ($navActions as $action)
                    @php
                        // Logika yang sama dengan desktop: cek apakah route atau slug page
                        $actionUrl =
                            isset($action['is_route']) && $action['is_route']
                                ? route($action['url'])
                                : url($action['url']);
                    @endphp
                    <a href="{{ $actionUrl }}"
                        class="w-full py-4 rounded-xl text-center font-bold text-white shadow-lg {{ $action['class'] }}">
                        {{ $action['label'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@if (!$isHome)
    <div class="h-[12vh] w-full"></div>
@endif
