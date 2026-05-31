@php
    $isHome = request()->is('/');
@endphp

<nav x-data="{
    navBg: false,
    isHome: {{ $isHome ? 'true' : 'false' }}
}" x-on:scroll.window="navBg = (window.pageYOffset > 20) ? true : false"
    :class="(isHome && !navBg) ? 'bg-transparent' : 'bg-blue-900 shadow-lg'"
    class="hidden lg:block fixed top-0 left-0 w-full h-[12vh] z-[100] transition-all duration-300">

    <div class="flex items-center h-full justify-between w-[90%] xl:w-[90%] mx-auto">

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

        {{-- Navlink Desktop --}}
        <div class="hidden lg:flex items-center space-x-10">
            @foreach ($customNavbar as $link) {{-- Ganti $customNavbar jadi $navLinks jika di AppServiceProvider kamu pakai nama itu --}}

                {{-- 1. RENDER JIKA ADMIN MEMILIH MENU SEBAGAI DROPDOWN --}}
                @if (isset($link['is_dropdown']) && $link['is_dropdown'])
                    <div class="relative group py-4">
                        <button
                            class="flex items-center space-x-1 text-white hover:text-pink-300 font-semibold transition-all focus:outline-none">
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
                            class="absolute left-0 top-full hidden group-hover:block w-56 bg-white rounded-xl shadow-xl py-3 z-[150] border border-gray-100">

                            {{-- Lakukan looping anak menu berdasarkan key 'children' dari Filament --}}
                            @if (isset($link['children']) && is_array($link['children']))
                                @foreach ($link['children'] as $sub)
                                    @php
                                        // Mengurai arah URL anak menu secara dinamis
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
                                        class="block px-5 py-2.5 text-sm font-semibold text-gray-700 hover:bg-pink-50 hover:text-pink-600 transition-colors">
                                        {{ $sub['label'] }}
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    {{-- 2. RENDER JIKA ADMIN MEMILIH LINK BIASA --}}
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

                    <a href="{{ $targetUrl }}" class="text-white hover:text-pink-300 font-semibold transition-all">
                        {{ $link['label'] }}
                    </a>
                @endif

            @endforeach
        </div>

        <div class="hidden lg:flex items-center space-x-4">
            @foreach ($navActions as $action)
                <a href="{{ url($action['url']) }}"
                    class="inline-block px-6 py-2 {{ $action['class'] }} text-white font-semibold rounded-lg shadow-md transition duration-300">
                    {{ $action['label'] }}
                </a>
            @endforeach
        </div>

    </div>
</nav>

@if (!$isHome)
    <div class="w-full bg-blue-900"></div>
@endif
