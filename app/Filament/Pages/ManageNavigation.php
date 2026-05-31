<?php

namespace App\Filament\Pages;

use App\Models\Navigation;
use App\Models\Page as StaticPage;
use App\Models\Category;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Notifications\Notification;
use Filament\Actions\Action;
// Tambahkan 3 import di bawah ini untuk mengaktifkan Actions/Tombol
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Grid;

class ManageNavigation extends Page implements HasActions // <--- Tambahkan implements HasActions
{
    use InteractsWithActions; // <--- Gunakan trait ini

    protected static ?string $navigationIcon = 'heroicon-o-bars-3';
    protected static ?string $navigationLabel = 'Menu';
    protected static ?string $navigationGroup = 'Blog Post';
    protected static ?string $title = 'Atur Navigasi Header';

    protected static string $view = 'filament.pages.manage-navigation';

    public ?array $data = [];

    public function mount(): void
    {
        $navigation = Navigation::firstOrCreate(
            ['key' => 'header_menu'],
            ['items' => []]
        );

        $this->form->fill($navigation->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                // REPEATER TINGKAT 1: MENU UTAMA
                Repeater::make('items')
                    ->label('')
                    ->addActionLabel('Tambah Menu Utama')
                    ->reorderable(true)
                    ->schema([

                        Grid::make(4)->schema([
                            TextInput::make('label')
                                ->label('Nama Menu Utama')
                                ->required()
                                ->placeholder('Misal: Profil, Akademik'),

                            // Toggle untuk menentukan apakah ini dropdown atau link biasa
                            Toggle::make('is_dropdown')
                                ->label('Jadikan Dropdown?')
                                ->reactive()
                                ->afterStateUpdated(function (callable $set, $state) {
                                    if ($state) {
                                        // Jika jadi dropdown, hapus link tipe bawaan menu utama
                                        $set('type', null);
                                    }
                                })
                                ->inline(false)
                                ->live(),

                            Select::make('type')
                                ->label('Jenis Link / Tujuan')
                                ->reactive()
                                ->hidden(fn(callable $get) => $get('is_dropdown') === true)
                                ->required(fn(callable $get) => !$get('is_dropdown'))
                                ->options([
                                    'url' => 'Custom URL / Link Luar',
                                    'category' => 'Kategori Blog',
                                ]),
                        ]),

                        // FIELD DINAMIS UNTUK MENU UTAMA (Hanya muncul jika BUKAN dropdown)
                        Grid::make()
                            ->hidden(fn(callable $get) => $get('is_dropdown') === true)
                            ->schema([
                                TextInput::make('url')
                                    ->label('Alamat URL')
                                    ->visible(fn(callable $get) => $get('type') === 'url')
                                    ->required(fn(callable $get) => $get('type') === 'url'),

                                Select::make('category_slug')
                                    ->label('Pilih Kategori Blog')
                                    ->options(Category::pluck('name', 'slug'))
                                    ->reactive()
                                    ->visible(fn(callable $get) => $get('type') === 'category')
                                    ->required(fn(callable $get) => $get('type') === 'category'),

                                Select::make('post_slug')
                                    ->label('Pilih Konten Spesifik (Opsional)')
                                    ->searchable()
                                    ->visible(fn(callable $get) => $get('type') === 'category' && $get('category_slug') !== null)
                                    ->options(fn(callable $get) => \App\Models\Post::whereHas('category', fn($q) => $q->where('slug', $get('category_slug')))->pluck('title', 'slug')),
                            ]),

                        // ========================================================
                        // REPEATER TINGKAT 2: SUB-MENU (Hanya muncul jika is_dropdown = true)
                        // ========================================================
                        Repeater::make('children')
                            ->label('Daftar Anak Menu (Dropdown Items)')
                            ->addActionLabel('Tambah Sub-Menu')
                            ->visible(fn(callable $get) => $get('is_dropdown') === true)
                            ->reorderable(true)
                            ->cloneable()
                            ->collapsible()
                            ->schema([
                                TextInput::make('label')
                                    ->label('Nama Sub-Menu')
                                    ->required()
                                    ->placeholder('Misal: Sejarah, Visi Misi'),

                                Select::make('type')
                                    ->label('Jenis Link / Tujuan')
                                    ->required()
                                    ->reactive()
                                    ->options([
                                        'url' => 'Custom URL / Link Luar',
                                        'category' => 'Kategori Blog',
                                    ]),

                                TextInput::make('url')
                                    ->label('Alamat URL')
                                    ->visible(fn(callable $get) => $get('type') === 'url')
                                    ->required(fn(callable $get) => $get('type') === 'url'),

                                Select::make('category_slug')
                                    ->label('Pilih Kategori Blog')
                                    ->options(Category::pluck('name', 'slug'))
                                    ->reactive()
                                    ->visible(fn(callable $get) => $get('type') === 'category')
                                    ->required(fn(callable $get) => $get('type') === 'category'),

                                Select::make('post_slug')
                                    ->label('Pilih Konten Spesifik (Opsional)')
                                    ->searchable()
                                    ->visible(fn(callable $get) => $get('type') === 'category' && $get('category_slug') !== null)
                                    ->options(fn(callable $get) => \App\Models\Post::whereHas('category', fn($q) => $q->where('slug', $get('category_slug')))->pluck('title', 'slug')),
                            ])
                            ->columns(4),

                    ]),

            ])
            ->statePath('data');
    }

    // Mengubah fungsi pembentuk tombol simpan agar dikenali oleh sistem Action Filament v3
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Navigasi')
                ->color('primary')
                ->submit('save'), // Mengarahkan submit ke function save()
        ];
    }

    public function save(): void
    {
        $state = $this->form->getState();

        $navigation = Navigation::where('key', 'header_menu')->first();
        $navigation->update([
            'items' => $state['items']
        ]);

        Notification::make()
            ->title('Berhasil!')
            ->body('Struktur menu navigasi header berhasil diperbarui.')
            ->success()
            ->send();
    }
}
