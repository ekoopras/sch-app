<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'thumbnail',
        'content',
        'meta_title',
        'meta_description',
        'tags',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'content' => 'array',      // Memperbaiki error foreach
        'tags' => 'array',         // Agar Filament TagsInput berfungsi
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Fungsi pembantu untuk menyaring gambar dari isi HTML tulisan
        $sinkronisasiGambarRichEditor = function ($post) {
            $htmlContent = $post->content;
            if (empty($htmlContent)) return;

            // Cari semua tag <img src="..." /> di dalam teks artikel
            preg_match_all('/<img[^>]+src="([^">]+)"/', $htmlContent, $matches);
            $urls = $matches[1] ?? [];

            foreach ($urls as $url) {
                // Ambil path relatifnya (misal dari http://127.0.0.1/storage/media/xyz.jpg menjadi media/xyz.jpg)
                if (str_contains($url, '/storage/media/')) {
                    $parsedUrl = parse_url($url, PHP_URL_PATH); // Membuang http://ip:port, hanya menyisakan /storage/media/gambar.png
                    $filePath = ltrim(str_replace('/storage/', '', $parsedUrl), '/');

                    // Cek apakah file ini sudah ada di database tabel media
                    $sudahAda = Media::where('file_path', $filePath)->exists();

                    if (!$sudahAda && Storage::disk('public')->exists($filePath)) {
                        // Daftarkan otomatis ke database pustaka media kita!
                        Media::create([
                            'file_name' => basename($filePath), // Nama acak dari Filament diijinkan mengalir di sini
                            'file_path' => $filePath,
                            'file_size' => round(Storage::disk('public')->size($filePath) / 1024, 2),
                            'mime_type' => Storage::disk('public')->mimeType($filePath),
                        ]);
                    }
                }
            }
        };

        // 1. Eksekusi robot saat artikel BARU dibuat
        static::saved($sinkronisasiGambarRichEditor);

        // 2. Eksekusi robot saat artikel DI-EDIT / DI-UPDATE
        static::updated($sinkronisasiGambarRichEditor);
    }
}
