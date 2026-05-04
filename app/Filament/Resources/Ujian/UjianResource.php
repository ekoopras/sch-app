<?php

namespace App\Filament\Resources\Ujian;

use App\Filament\Resources\Ujian\UjianResource\Pages;
use App\Filament\Resources\Ujian\UjianResource\RelationManagers;
use App\Models\BankSoal;
use App\Models\Ujian;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Get;
use Filament\Support\Enums\Alignment;

class UjianResource extends Resource
{
    protected static ?string $model = Ujian::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Ruang Ujian';
    protected static ?string $navigationGroup = 'Ujian';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\Select::make('kelase')
                            ->label('Kelas')
                            ->relationship('kelase', 'kelas')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->required(),

                        Forms\Components\Select::make('mapel_id')
                            ->label('Mapel')
                            ->options(function () {

                                $user = auth()->user();

                                if ($user->isSuperAdmin()) {
                                    return \App\Models\Mapel::pluck('mapel', 'id');
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

                        Forms\Components\Select::make('bank_soal_id')
                            ->label('Bank Soal')
                            ->searchable()
                            ->options(function (Get $get) {

                                if (!$get('mapel_id')) {
                                    return [];
                                }

                                return BankSoal::where('mapel_id', $get('mapel_id'))
                                    ->with('mapel')
                                    ->get()
                                    ->mapWithKeys(fn($record) => [
                                        $record->id =>
                                        $record->mapel->mapel
                                            . ' | ' . $record->kelas
                                            . ' | Semester ' . $record->semester,
                                    ]);
                            })
                            ->required(),

                        Forms\Components\TextInput::make('token')
                            ->label('Token')
                            ->disabled() // tidak bisa diubah user
                            ->dehydrated(false) // jangan kirim ke backend (biar auto generate)
                            ->default(function () {
                                return strtoupper(Str::random(6));
                            })
                            ->suffixAction(
                                Forms\Components\Actions\Action::make('generate')
                                    ->icon('heroicon-o-arrow-path')
                                    ->label('Generate')
                                    ->action(function (Forms\Set $set) {
                                        $set('token', strtoupper(Str::random(6)));
                                    })
                            ),

                        Forms\Components\TextInput::make('durasi_menit')
                            ->label('Durasi Ujian (menit)')
                            ->numeric()
                            ->default(60)
                            ->suffix('menit')
                            ->required(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->onColor('success')
                            ->offColor('danger')
                            ->inline(false)
                            ->default(false),


                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mapel.mapel')
                    ->label('Mapel')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        $words = explode(' ', $state);
                        // ambil 4 kata pertama untuk baris pertama
                        $firstLine = implode(' ', array_slice($words, 0, 3));
                        // sisanya untuk baris kedua
                        $secondLine = implode(' ', array_slice($words, 3));
                        // gabungkan dengan <br>
                        return $firstLine . '<br>' . $secondLine;
                    })
                    ->html(),
                Tables\Columns\TextColumn::make('kelase.kelas')
                    ->label('Kelas')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('success'),
                Tables\Columns\TextColumn::make('token')
                    ->label('Token Ujian')
                    ->badge()
                    ->color('success')
                    ->copyable(),
                Tables\Columns\TextColumn::make('durasi_menit')
                    ->label('Durasi')
                    ->suffix(' menit'),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status Aktif')
                    ->onColor('success')
                    ->offColor('danger')
                    ->beforeStateUpdated(function ($record, $state) {
                        // (Opsional) Tambahkan logika di sini jika ingin 
                        // melakukan sesuatu sebelum data disimpan
                    }),
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
            'index' => Pages\ListUjians::route('/'),
            //'create' => Pages\CreateUjian::route('/create'),
            //'edit' => Pages\EditUjian::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->isSuperAdmin(); // hanya super admin
    }
}
