<x-filament-panels::page>
    <form wire:submit.prevent="save" class="space-y-6">
        {{ $this->form }}

        {{-- MEMPERBAIKI PEMANGGILAN TOMBOL AKSI --}}
        <div class="flex flex-wrap items-center gap-4 justify-start">
            @foreach ($this->getFormActions() as $action)
                {{ $action }}
            @endforeach
        </div>
    </form>
</x-filament-panels::page>
