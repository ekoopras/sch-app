<?php

namespace App\Filament\Resources\Blog;

use App\Filament\Resources\Blog\PageResource\Pages;
use App\Filament\Resources\Blog\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Str;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationLabel = 'Halaman';
    protected static ?string $navigationGroup = 'Blog Post';
    protected static ?string $navigationIcon = 'heroicon-o-window';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Header Halaman')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Halaman')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->label('URL Slug')
                            ->required()
                            ->unique(Page::class, 'slug', ignoreRecord: true),
                    ])->columns(2),

                Section::make('Isi Konten')
                    ->description('Klik tombol di bawah untuk menambah blok teks atau gambar.')
                    ->schema([
                        // GANTI REPEATER MENJADI BUILDER
                        Builder::make('content')
                            ->label('Susunan Konten')
                            ->blocks([
                                Builder\Block::make('layout_block')
                                    ->label('Blok Kolom (Grid)')

                                    ->schema([
                                        // Pilih Jumlah Kolom
                                        Select::make('columns')
                                            ->label('Jumlah Kolom (Desktop)')
                                            ->options([
                                                '1' => '1 Kolom',
                                                '2' => '2 Kolom',
                                                '3' => '3 Kolom',
                                                '4' => '4 Kolom',
                                            ])
                                            ->default('2')
                                            ->required(),

                                        // Repeater untuk isi setiap kolom
                                        Repeater::make('items')
                                            ->label('Isi Tiap Kolom')
                                            ->schema([
                                                Builder::make('column_content')
                                                    ->label('Konten Kolom')
                                                    ->blocks([
                                                        // Kita masukkan lagi blok teks dan gambar di sini
                                                        Builder\Block::make('text_block')
                                                            ->label('Teks')
                                                            ->icon('heroicon-o-bars-3-bottom-left')
                                                            ->schema([
                                                                RichEditor::make('body')->required(),
                                                            ]),
                                                        Builder\Block::make('image_block')
                                                            ->label('Gambar')
                                                            ->icon('heroicon-o-camera')
                                                            ->schema([
                                                                FileUpload::make('image')->directory('pages')->image()->required(),
                                                                TextInput::make('caption'),
                                                            ]),
                                                        Builder\Block::make('raw_html')
                                                            ->label('Blok Kode Kustom (HTML)')
                                                            ->icon('heroicon-o-code-bracket')
                                                            ->schema([
                                                                Textarea::make('code')
                                                                    ->label('Masukkan Kode HTML/Script')
                                                                    ->rows(10)
                                                                    ->required()
                                                                    ->helperText('Hati-hati! Kode di sini akan langsung di-render ke halaman.'),
                                                            ]),
                                                    ])
                                            ])
                                            ->grid(2) // Agar tampilan di admin rapi (split 2 kolom)
                                            ->addActionLabel('Tambah Kolom Baru')
                                    ]),
                            ])
                            ->columnSpanFull()
                            ->collapsible()
                            ->blockNumbers(false),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Halaman')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->fontFamily('mono')
                    ->color('gray'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Update')
                    ->dateTime('d M Y'),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
