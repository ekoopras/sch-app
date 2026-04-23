<?php

namespace App\Filament\Resources\Data;

use App\Filament\Resources\Data\SiswaResource\Pages;
use App\Filament\Resources\Data\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Data Siswa';
    protected static ?string $navigationGroup = 'Data';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama'),
                Forms\Components\TextInput::make('absen')
                    ->label('Absen')
                    ->numeric(),
                Forms\Components\TextInput::make('nis')
                    ->label('NIS')
                    ->numeric(),
                Forms\Components\Select::make('kelase_id')
                    ->label('Kelas')
                    ->relationship('kelase', 'kelas')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('absen')
                    ->label('Absen')
                    ->searchable(),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('nis')
                    ->label('NIS')
                    ->searchable(),

                Tables\Columns\TextColumn::make('kelase.kelas')
                    ->label('kelas')
                    ->searchable(),
            ])
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
            'index' => Pages\ListSiswas::route('/'),
            //'create' => Pages\CreateSiswa::route('/create'),
            //'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
