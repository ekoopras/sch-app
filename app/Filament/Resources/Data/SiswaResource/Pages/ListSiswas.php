<?php

namespace App\Filament\Resources\Data\SiswaResource\Pages;

use App\Filament\Resources\Data\SiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSiswas extends ListRecords
{
    protected static string $resource = SiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('+ Add Siswa')
                ->color('success'),
        ];
    }
}
