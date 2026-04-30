<?php

namespace App\Filament\Resources\Blog\FolderResource\Pages;

use App\Filament\Resources\Blog\FolderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFolder extends CreateRecord
{
    protected static string $resource = FolderResource::class;
}
