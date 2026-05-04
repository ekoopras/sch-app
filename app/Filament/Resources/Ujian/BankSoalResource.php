<?php

namespace App\Filament\Resources\Ujian;

use App\Filament\Resources\Ujian\BankSoalResource\Pages;
use App\Filament\Resources\Ujian\BankSoalResource\RelationManagers;
use App\Models\BankSoal;
use App\Models\Mapel;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\Alignment;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BankSoalResource extends Resource
{
    protected static ?string $model = BankSoal::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationLabel = 'Bank Soal';
    protected static ?string $navigationGroup = 'Ujian';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()
                    ->schema([

                        Forms\Components\TextInput::make('title')
                            ->label('Title'),

                    ])->columns(1),

                Section::make()
                    ->schema([


                        Forms\Components\Select::make('mapel_id')
                            ->label('Mapel')
                            ->options(function () {

                                $user = auth()->user();

                                if ($user->isSuperAdmin()) {
                                    return Mapel::pluck('mapel', 'id');
                                }

                                return $user->mapel()
                                    ->pluck('mapel', 'mapels.id'); // penting!
                            })
                            ->default(function () {

                                $user = auth()->user();

                                if (!$user->isSuperAdmin()) {
                                    return $user->mapel()
                                        ->select('mapels.id')
                                        ->value('mapels.id');
                                }

                                return null;
                            })
                            ->required(),
                        Forms\Components\Select::make('kelas')
                            ->options([
                                'Kelas-7' => 'Kelas 7',
                                'Kelas-8' => 'Kelas 8',
                                'Kelas-9' => 'Kelas 9',
                            ])
                            ->required(),

                        Forms\Components\Select::make('semester')
                            ->options([
                                '1' => 'Semester 1',
                                '2' => 'Semester 2',
                            ])
                            ->required(),
                    ])->columns(3),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('title')
                    ->label('Title'),

                Tables\Columns\TextColumn::make('mapel.mapel')
                    ->label('Mapel')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('kelas')
                    ->alignment(Alignment::Center),

                Tables\Columns\TextColumn::make('semester')
                    ->alignment(Alignment::Center)
                    ->badge(),

                // Tables\Columns\TextColumn::make('soals_count')
                //     ->label('Jumlah Soal')
                //     ->counts('soals') // otomatis hitung relasi
                //     ->sortable()
                //     ->badge()
                //     ->alignment(Alignment::Center)
                //     ->color(fn(int $state): string => $state > 0 ? 'success' : 'secondary'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

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

                Tables\Actions\Action::make('kelolaSoal')
                    ->label('Kelola Isi Soal')
                    ->icon('heroicon-m-document-plus')
                    ->color('success')
                    ->url(fn(BankSoal $record) => static::getUrl('isi-soal', ['record' => $record])),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListBankSoals::route('/'),
            //'create' => Pages\CreateBankSoal::route('/create'),
            //'edit' => Pages\EditBankSoal::route('/{record}/edit'),
            'isi-soal' => Pages\Soal::route('/{record}/soal'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->isSuperAdmin(); // hanya super admin
    }
}
