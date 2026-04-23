<?php

namespace App\Filament\Resources\Data;

use App\Filament\Resources\Data\KelaseResource\Pages;
use App\Filament\Resources\Data\KelaseResource\RelationManagers;
use App\Models\Kelase;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class KelaseResource extends Resource
{
    protected static ?string $model = Kelase::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationLabel = 'Kelas';
    protected static ?string $navigationGroup = 'Data';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kelas')
                    ->label('Kelas')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

                Forms\Components\Hidden::make('slug'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('kelas')
                    ->label('Kelas')
                    ->formatStateUsing(fn($state) => Str::title($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug'),
            ])
            ->defaultSort('kelas', 'asc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label(false)
                    ->color('success')
                    ->button(),
                Tables\Actions\DeleteAction::make()
                    ->label(false)
                    ->button(),
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
            'index' => Pages\ListKelases::route('/'),
            //'create' => Pages\CreateKelase::route('/create'),
            //'edit' => Pages\EditKelase::route('/{record}/edit'),
        ];
    }
}
