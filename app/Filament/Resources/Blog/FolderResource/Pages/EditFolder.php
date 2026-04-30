<?php

namespace App\Filament\Resources\Blog\FolderResource\Pages;

use App\Filament\Resources\Blog\FolderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFolder extends EditRecord
{
    protected static string $resource = FolderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
