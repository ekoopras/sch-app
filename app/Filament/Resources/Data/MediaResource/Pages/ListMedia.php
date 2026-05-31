<?php

namespace App\Filament\Resources\Data\MediaResource\Pages;

use App\Filament\Resources\Data\MediaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Storage;


class ListMedia extends ListRecords
{
    protected static string $resource = MediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Media Baru')
                ->modalHeading('Upload Gambar Baru')
                ->mutateFormDataUsing(function (array $data): array {
                    $filePath = $data['file_path'] ?? null;

                    if ($filePath) {
                        // Ambil nama file dari path fisik (Otomatis memotong 'media/' menjadi 'foto-jalan.jpg')
                        $data['file_name'] = basename($filePath);

                        // Ambil spek file dari storage
                        if (Storage::disk('public')->exists($filePath)) {
                            $data['file_size'] = round(Storage::disk('public')->size($filePath) / 1024, 2);
                            $data['mime_type'] = Storage::disk('public')->mimeType($filePath);
                        }
                    }

                    return $data;
                }),
        ];
    }
}
