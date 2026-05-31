<?php

namespace App\Filament\Resources\Data;

use App\Filament\Resources\Data\MediaResource\Pages;
use App\Filament\Resources\Data\MediaResource\RelationManagers;
use App\Models\Media;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Media File';
    protected static ?string $navigationGroup = 'Blog Post';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('file_name')
                    ->label('Nama File / Judul Gambar')
                    ->placeholder('Contoh: foto-jalan.jpg')
                    ->maxLength(255),
                FileUpload::make('file_path')
                    ->label('Pilih Gambar Baru')
                    ->image()
                    ->required()
                    ->directory('media') // File otomatis masuk ke storage/public/media
                    ->preserveFilenames(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('file_path')
                    ->label('Preview Foto')
                    ->square()
                    ->size(100)
                    ->disk('public'),

                TextColumn::make('file_name')
                    ->label('Nama File')
                    ->searchable()
                    ->wrap(),

                TextColumn::make('file_size')
                    ->label('Ukuran')
                    ->suffix(' KB')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMedia::route('/'),
            //'create' => Pages\CreateMedia::route('/create'),
            //'edit' => Pages\EditMedia::route('/{record}/edit'),
        ];
    }
}
