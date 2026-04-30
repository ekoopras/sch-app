<?php

namespace App\Filament\Resources\Blog\FolderResource\Pages;

use App\Filament\Resources\Blog\FolderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFolders extends ListRecords
{
    protected static string $resource = FolderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
