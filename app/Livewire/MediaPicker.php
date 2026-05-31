<?php

namespace App\Livewire;

use App\Models\Media;
use Livewire\Component;
use Livewire\WithFileUploads;

class MediaPicker extends Component
{
    use WithFileUploads;

    public $foto_baru; // Tetap pertahankan ini untuk upload

    public function uploadFoto()
    {
        $this->validate([
            'foto_baru' => 'image|max:1024',
        ]);

        $namaAsli = $this->foto_baru->getClientOriginalName();
        $path = $this->foto_baru->storeAs('media', $namaAsli, 'public');

        Media::create([
            'file_name' => $namaAsli,
            'file_path' => $path,
            'file_size' => round($this->foto_baru->getSize() / 1024, 2),
            'mime_type' => $this->foto_baru->getClientMimeType(),
        ]);

        $this->foto_baru = null;
    }

    public function render()
    {
        // Langsung tarik semua media, pencarian akan dihandle oleh Alpine.js di View
        return view('livewire.media-picker', [
            'mediaItems' => Media::latest()->get()
        ]);
    }
}
