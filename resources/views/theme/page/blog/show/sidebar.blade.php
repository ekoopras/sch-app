<div class="space-y-8 sticky top-24">

    {{-- Widget: Cari --}}
    <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100">
        <h4 class="text-xl font-bold text-blue-950 mb-4">Cari Berita</h4>
        <form action="/blog" method="GET" class="relative">
            <input type="text" name="search" placeholder="Ketikan kata kunci..."
                class="w-full pl-4 pr-12 py-3 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-pink-500 transition">
            <button class="absolute right-3 top-1/2 -translate-y-1/2 text-pink-500">
                <span class="material-symbols-outlined">search</span>
            </button>
        </form>
    </div>

    {{-- Widget: Berita Terbaru --}}
    <div class="bg-blue-950 p-8 rounded-[2rem] shadow-xl text-white">
        <h4 class="text-xl font-bold mb-6 border-b border-white/10 pb-4">Berita Terbaru</h4>
        <div class="space-y-6">
            {{-- Loop ini hanya contoh, sesuaikan dengan variabel dari Controller --}}
            @foreach ($recentPosts as $recent)
                <a href="{{ url('blog/' . $recent->slug) }}" class="group flex gap-4 items-center">
                    <div class="w-20 h-20 rounded-xl overflow-hidden shrink-0">
                        <img src="{{ asset('storage/' . $recent->thumbnail) }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div>
                        <h5 class="font-bold text-sm leading-snug group-hover:text-pink-400 transition">
                            {{ $recent->title }}</h5>
                        <p class="text-[10px] opacity-60 mt-1">{{ $recent->created_at->diffForHumans() }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    {{-- Widget: Media Sosial --}}
    <div class="bg-pink-50 p-8 rounded-[2rem] border border-pink-100">
        <h4 class="text-xl font-bold text-blue-950 mb-4">Ikuti Kami</h4>
        <div class="flex gap-3">
            <a href="#"
                class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-pink-600 shadow-sm hover:bg-pink-600 hover:text-white transition">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="#"
                class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-pink-600 shadow-sm hover:bg-pink-600 hover:text-white transition">
                <i class="fab fa-youtube"></i>
            </a>
            <a href="#"
                class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-pink-600 shadow-sm hover:bg-pink-600 hover:text-white transition">
                <i class="fab fa-tiktok"></i>
            </a>
        </div>
    </div>

</div>
