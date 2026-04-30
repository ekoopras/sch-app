<div class="flex items-center gap-4"> {{-- gap-4 untuk menambah jarak horizontal antara gambar & teks --}}
    {{-- Logo --}}
    <div class="w-11 h-11 flex items-center justify-center overflow-hidden shadow-lg">
        <img src="{{ asset('logoapp.png') }}" alt="logo" class="w-full h-full object-contain">
    </div>

    {{-- Teks (Judul & Sub-judul) --}}
    <div class="flex flex-col justify-center" style="line-height: 1.2;"> {{-- line-height ditambah dikit biar tidak tumpuk --}}
        <h1 class="text-lg font-bold tracking-tight text-gray-900 dark:text-white">
            SPENSATA
        </h1>
        <p class="font-medium tracking-widest uppercase text-gray-500 dark:text-gray-400"
            style="font-size: 10px; margin-top: 4px;"> {{-- margin-top ditambah supaya tidak nempel ke atas --}}
            SMPN 1 TASIKMADU
        </p>
    </div>
</div>
