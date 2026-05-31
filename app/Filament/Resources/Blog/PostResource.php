<?php

namespace App\Filament\Resources\Blog;

use App\Filament\Resources\Blog\PostResource\Pages;
use App\Filament\Resources\Blog\PostResource\RelationManagers;
use App\Models\Media;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Actions\Action;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationLabel = 'Blog Artikel';
    protected static ?string $navigationGroup = 'Blog Post';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Kita bungkus semua dalam Grid 3 kolom
                Forms\Components\Grid::make(3)
                    ->schema([

                        // KOLOM KIRI (Konten & SEO) - Mengambil 2 dari 3 bagian
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\Section::make('Utama')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Judul Artikel')
                                            ->required()
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

                                        Forms\Components\TextInput::make('slug')
                                            ->label('URL Slug')
                                            ->required()
                                            ->unique(Post::class, 'slug', ignoreRecord: true),

                                        Forms\Components\RichEditor::make('content')
                                            ->label('Isi Konten')
                                            ->required()
                                            ->columnSpanFull()
                                            ->fileAttachmentsDirectory('media'),
                                    ]),

                                Forms\Components\Section::make('Optimasi SEO')
                                    ->schema([
                                        Forms\Components\TextInput::make('meta_title')
                                            ->maxLength(60),
                                        Forms\Components\Textarea::make('meta_description')
                                            ->maxLength(160),
                                        Forms\Components\TagsInput::make('tags'),
                                    ]),
                            ])
                            ->columnSpan(2),

                        // KOLOM KANAN (Publikasi & Kategori) - Mengambil 1 dari 3 bagian
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\Section::make('Publikasi')
                                    ->schema([
                                        Forms\Components\Select::make('category_id')
                                            ->label('Kategori')
                                            ->relationship('category', 'name')
                                            ->searchable()
                                            ->required(),

                                        // Forms\Components\FileUpload::make('thumbnail')
                                        //     ->label('Thumbnail')
                                        //     ->image()
                                        //     ->directory('blog/thumbnail')
                                        //     ->getUploadedFileNameForStorageUsing(
                                        //         fn($file): string => (string) $file->getClientOriginalName(),
                                        //     )
                                        //     ->preserveFilenames()
                                        //     ->columnSpanFull()
                                        //     ->maxSize(1024)
                                        //     ->helperText('Format: JPG, PNG, atau WEBP. Maksimal 1MB.'),

                                        TextInput::make('thumbnail')
                                            ->label('Thumbnail Artikel')
                                            ->placeholder('Belum ada foto dipilih')
                                            ->readonly()
                                            ->required()
                                            ->columnSpanFull()
                                            ->suffixAction(
                                                Action::make('bukaModalMedia')
                                                    ->label('Buka Pustaka / Upload Foto')
                                                    ->icon('heroicon-m-photo')
                                                    ->color('primary')

                                                    ->modalHeading('Pustaka Media & Pengunggah')
                                                    ->modalWidth('6xl')
                                                    ->modalSubmitAction(false)

                                                    // JALUR AMAN: Panggil via blade view pembungkus Livewire
                                                    ->modalContent(fn() => view('filament.pages.media-modal-wrapper'))
                                            ),

                                        Forms\Components\Toggle::make('is_published')
                                            ->label('Publish Status')
                                            ->helperText('Aktifkan untuk menampilkan di website'),

                                        Forms\Components\DateTimePicker::make('published_at')
                                            ->label('Waktu Terbit')
                                            ->default(now()),
                                    ]),
                            ])
                            ->columnSpan(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->square(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->wrap()
                    ->sortable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Status')
                    ->boolean(),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Terbit Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name'),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Status Publikasi'),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
