<x-filament-panels::page>
    <x-filament::section>
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-lg font-bold">{{ $record->title }}</h2>
                <p class="text-sm text-gray-500">{{ $record->mapel->mapel }} | {{ $record->kelas }}</p>
            </div>
        </div>
    </x-filament::section>

    <div class="space-y-4">
        @forelse($record->soals as $index => $soal)
            <x-filament::section>
                <x-slot name="heading">
                    <div class="flex justify-between items-center w-full">
                        <div class="flex gap-2">
                            <x-filament::badge color="gray">Nomor Soal {{ $index + 1 }}</x-filament::badge>
                            <x-filament::badge color="info">
                                {{ str($soal->tipe_soal)->replace('_', ' ')->upper() }}
                            </x-filament::badge>
                        </div>
                        <div class="flex gap-2">
                            {{ ($this->editSoalAction)(['id' => $soal->id]) }}
                            {{ ($this->deleteSoalAction)(['id' => $soal->id]) }}
                        </div>
                    </div>
                </x-slot>

                <div class="prose dark:prose-invert max-w-none mb-4 text-sm">
                    {!! $soal->soal !!}
                </div>

                @if ($soal->gambar)
                    <img src="{{ asset('storage/' . $soal->gambar) }}" class="w-48 rounded-lg mb-4 border">
                @endif

                <div class="bg-gray-100 dark:bg-gray-900 p-4 rounded-xl text-sm">
                    @php
                        $opsi =
                            $soal->tipe_soal === 'choice'
                                ? $soal->choice ?? []
                                : ($soal->tipe_soal === 'multiple_choice'
                                    ? $soal->multiple_choice ?? []
                                    : $soal->matching ?? []);
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @foreach ($opsi as $item)
                            <div
                                class="p-2 bg-white dark:bg-gray-800 rounded border dark:border-gray-700 flex items-center gap-3">
                                @if ($soal->tipe_soal === 'matching')
                                    {{-- Tampilan Matching --}}
                                    <div class="flex-1 italic">
                                        {{ $item['kiri'] }} ➜ <span class="font-bold">{{ $item['kanan'] }}</span>
                                    </div>
                                    <div class="text-[10px] font-mono text-gray-400">
                                        Skor: {{ $item['matching_skor'] ?? 0 }}
                                    </div>
                                @else
                                    {{-- Tampilan Choice & Multiple Choice --}}
                                    <div class="font-bold text-primary-600 w-6 flex-shrink-0">{{ $item['opsi'] }}.
                                    </div>
                                    <div class="flex-1">
                                        {{ $item['jawaban'] }}
                                        @if (!empty($item['jawaban_img']))
                                            <img src="{{ asset('storage/' . $item['jawaban_img']) }}"
                                                class="w-8 h-8 rounded mt-1">
                                        @endif
                                    </div>

                                    {{-- Tampilkan skor di sebelah kanan --}}
                                    <div
                                        class="text-[10px] font-mono font-bold px-2 py-0.5 bg-gray-100 dark:bg-gray-700 rounded text-gray-500">
                                        Skor: {{ $item['skor'] ?? 0 }}
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </x-filament::section>
        @empty
            <div class="text-center py-10 border-2 border-dashed rounded-xl text-gray-400">Belum ada soal.</div>
        @endforelse
    </div>
    <x-filament-actions::modals />
</x-filament-panels::page>
