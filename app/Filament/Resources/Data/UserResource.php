<?php

namespace App\Filament\Resources\Data;

use App\Filament\Resources\Data\UserResource\Pages;
use App\Filament\Resources\Data\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'User';
    protected static ?string $navigationGroup = 'Data';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('name')
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),

                Forms\Components\TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn($state) => filled($state) ? bcrypt($state) : null)
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn(string $context) => $context === 'create'),

                Forms\Components\Select::make('mapel')
                    ->label('Mapel')
                    ->relationship('mapel', 'mapel')
                    ->multiple()
                    ->preload()
                    ->searchable(),

                Forms\Components\Select::make('role')
                    ->options([
                        'super_admin' => 'Super Admin',
                        'guru' => 'Guru',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('no')
                    ->label('No')
                    ->rowIndex(),

                Tables\Columns\TextColumn::make('name')
                    ->formatStateUsing(fn($state) => Str::title($state))
                    ->searchable(),

                Tables\Columns\TextColumn::make('email'),

                Tables\Columns\TextColumn::make('mapel.mapel')
                    ->label('Mapel')
                    ->badge()
                    ->color('success')
                    ->formatStateUsing(fn($state) => Str::title($state)),

                Tables\Columns\TextColumn::make('role'),


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
            'index' => Pages\ListUsers::route('/'),
            //'create' => Pages\CreateUser::route('/create'),
            //'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->isSuperAdmin(); // hanya super admin
    }
}
