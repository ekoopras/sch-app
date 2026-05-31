<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Intervention\Image\Laravel\Facades\Image as FacadesImage;

class Media extends Model
{
    // Hapus 'file_hash' dari daftar ini
    protected $fillable = [
        'file_name',
        'file_path',
        'mime_type',
        'file_size',
    ];

    protected static function boot()
    {
        parent::boot();

        // Tetap pertahankan auto-delete file fisik saat data di DB dihapus
        static::deleted(function ($media) {
            if ($media->file_path && Storage::disk('public')->exists($media->file_path)) {
                Storage::disk('public')->delete($media->file_path);
            }
        });
    }
}
