<?php

namespace App\Filament\Resources\Ujian\BankSoalResource\Pages;

use App\Filament\Resources\Ujian\BankSoalResource;
use App\Models\Soal as SoalModel;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\Page;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Notifications\Notification;

class Soal extends Page
{
    use InteractsWithRecord;

    protected static string $resource = BankSoalResource::class;
    protected static string $view = 'filament.resources.ujian.bank-soal-resource.pages.soal';

    public function mount(int | string $record): void
    {
        $this->record = $this->resolveRecord($record);
    }

    // Fungsi pembantu untuk schema opsi agar identik (Grid 12)
    protected function getOpsiSchema(): array
    {
        return [
            Grid::make(12)
                ->schema([
                    TextInput::make('opsi')->label('Opsi')->placeholder('A')->required()->columnSpan(1),
                    TextInput::make('jawaban')->label('Jawaban')->required()->columnSpan(6),
                    TextInput::make('skor')->label('Skor')->numeric()->default(0)->columnSpan(2),
                    FileUpload::make('jawaban_img')->label('File')->image()->directory('jawaban')->disk('public')->columnSpan(3),
                ])
        ];
    }

    protected function getSoalFormSchema(): array
    {
        return [
            Section::make()
                ->schema([
                    Grid::make(3)
                        ->schema([
                            RichEditor::make('soal')->label('Pertanyaan')->required()->columnSpan(2),
                            Grid::make(1)
                                ->schema([
                                    Select::make('tipe_soal')
                                        ->label('Tipe Soal')
                                        ->options([
                                            'choice' => 'Pilihan Ganda (1 Jawaban)',
                                            'multiple_choice' => 'Pilihan Ganda Kompleks (>1 Jawaban)',
                                            'matching' => 'Menjodohkan (Matching)',
                                        ])->required()->reactive(),
                                    FileUpload::make('gambar')->label('Gambar Soal')->image()->directory('soal')->disk('public'),
                                ])->columnSpan(1),
                        ]),
                ]),

            Repeater::make('choice')
                ->label('Pilihan Jawaban (Single)')
                ->visible(fn($get) => $get('tipe_soal') === 'choice')
                ->schema($this->getOpsiSchema())->columnSpanFull(),

            Repeater::make('multiple_choice')
                ->label('Pilihan Jawaban (Multiple)')
                ->visible(fn($get) => $get('tipe_soal') === 'multiple_choice')
                ->schema($this->getOpsiSchema())->columnSpanFull(),

            /* ===============================
             | MATCHING
             =============================== */
            Repeater::make('matching')
                ->label('Soal Matching')
                ->default([])
                ->minItems(1)
                ->visible(fn($get) => $get('tipe_soal') === 'matching')
                ->schema([
                    Grid::make()
                        ->columns(2)
                        ->schema([

                            // ===== KOLOM KIRI =====
                            Grid::make()
                                ->schema([
                                    TextInput::make('kiri')
                                        ->label('Pertanyaan (Kiri)')
                                        ->required(),

                                    TextInput::make('kanan')
                                        ->label('Jawaban (Kanan)')
                                        ->required(),


                                ]),

                            // ===== KOLOM KANAN =====
                            Grid::make()
                                ->schema([
                                    FileUpload::make('kiri_img')
                                        ->label('Gambar Kiri')
                                        ->image()
                                        ->directory('matching/kiri')
                                        ->nullable(),

                                    FileUpload::make('kanan_img')
                                        ->label('Gambar Kanan')
                                        ->image()
                                        ->directory('matching/kanan')
                                        ->nullable(),
                                ]),
                        ]),

                    TextInput::make('matching_skor')
                        ->label('Skor')
                        ->numeric()
                        ->default(0)
                        ->required()
                        ->columnSpanFull(),


                ])
                ->columnSpanFull(),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('addSoal')
                ->label('Tambah Soal')
                ->icon('heroicon-m-plus')
                ->form($this->getSoalFormSchema())
                ->action(function (array $data) {
                    $this->record->soals()->create($data);
                    Notification::make()->title('Soal Berhasil Ditambah')->success()->send();
                }),
        ];
    }

    public function editSoalAction(): Action
    {
        return Action::make('editSoal')
            ->fillForm(fn(array $arguments) => SoalModel::find($arguments['id'])->toArray())
            ->form($this->getSoalFormSchema())
            ->action(function (array $data, array $arguments) {
                SoalModel::find($arguments['id'])->update($data);
                Notification::make()->title('Soal Diperbarui')->success()->send();
            });
    }

    public function deleteSoalAction(): Action
    {
        return Action::make('deleteSoal')
            ->requiresConfirmation()
            ->color('danger')
            ->action(function (array $arguments) {
                SoalModel::find($arguments['id'])->delete();
                Notification::make()->title('Soal Dihapus')->warning()->send();
            });
    }
}
