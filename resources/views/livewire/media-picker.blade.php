<div class="p-4" x-data="{ search: '' }">
    <div class="mb-6 p-4 border rounded-xl bg-gray-50 dark:bg-gray-900">
        <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">Upload Foto Baru ke
            Pustaka</label>
        <div class="flex items-center gap-4">
            <input type="file" wire:model="foto_baru"
                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
            <button type="button" wire:click="uploadFoto" wire:loading.attr="disabled"
                class="px-4 py-2 bg-primary-600 text-white rounded-md text-sm font-medium shadow hover:bg-primary-500 disabled:opacity-50">
                <span wire:loading.remove>Upload Sekarang</span>
                <span wire:loading>Mengupload...</span>
            </button>
        </div>
        @error('foto_baru')
            <span class="text-danger-600 text-xs mt-1 block">{{ $message }}</span>
        @enderror
    </div>

    <hr class="my-4 border-gray-200 dark:border-gray-700">

    <div class="mb-4">
        <input type="text" x-model="search" placeholder="Cari nama foto di pustaka..."
            class="w-full max-w-md px-3 py-2 text-sm border rounded-lg dark:bg-gray-800 dark:border-gray-700">
    </div>

    @if ($mediaItems->isEmpty())
        <div class="text-center py-8 text-gray-400">
            <p>Pustaka media masih kosong.</p>
        </div>
    @else
        <div
            class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 max-h-[400px] overflow-y-auto p-1">
            @foreach ($mediaItems as $media)
                <div x-show="search === '' || '{{ strtolower($media->file_name) }}'.includes(search.toLowerCase())"
                    class="group relative border rounded-lg overflow-hidden cursor-pointer hover:border-primary-500 transition-all p-1 bg-white dark:bg-gray-800 shadow-sm"
                    {{-- PERBAIKAN DI SINI: Tembak langsung ID / Name Input Field milik Filament --}}
                    x-on:click="
                        const inputThumbnail = document.getElementById('data.thumbnail');
                        if (inputThumbnail) {
                            inputThumbnail.value = '{{ $media->file_path }}';
                            // Pemicu agar Filament/Livewire sadar kalau isinya sudah berubah
                            inputThumbnail.dispatchEvent(new Event('input'));
                        }
                        close();
                    ">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($media->file_path) }}"
                        alt="{{ $media->file_name }}" class="w-full h-28 object-cover rounded">
                    <div class="p-1 mt-1 text-xs truncate text-gray-600 dark:text-gray-400 text-center"
                        title="{{ $media->file_name }}">
                        {{ $media->file_name }}
                    </div>
                    <div
                        class="absolute inset-0 bg-primary-500 bg-opacity-10 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                        <span class="bg-primary-600 text-white text-xs px-2 py-1 rounded shadow">Pilih Foto</span>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
