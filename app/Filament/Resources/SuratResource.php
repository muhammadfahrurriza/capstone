<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ManagerResource\RelationManagers\CetakSuratRelationManager;
use Filament\Forms;
use Filament\Tables;
use App\Models\Surat;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TimePicker;
use App\Filament\Resources\SuratResource\Pages;
// use Torgodly\Html2Media\Actions\Html2MediaAction;
use Torgodly\Html2Media\Tables\Actions\Html2MediaAction;

class SuratResource extends Resource
{
    protected static ?string $model = Surat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Jam Kerja')
                    ->schema([
                        Group::make()->relationship('jamkerja')
                            ->schema([
                                DatePicker::make('tgl')->label('Tanggal'),
                                TimePicker::make('jam_mulai')->label('Jam Mulai'),
                                TimePicker::make('jam_akhir')->label('Jam Akhir'),
                            ]),
                    ]),

                Section::make('Detail Lokasi')
                    ->schema([
                        Group::make()->relationship('lokasi')
                            ->schema([
                                TextInput::make('nama_lokasi')->label('Nama Lokasi'),
                                TextInput::make('latitude')->numeric()->label('Latitude'),
                                TextInput::make('longtitude')->numeric()->label('Longtitude'),
                                TextInput::make('radius')->numeric()->label('Radius (Meter)'),
                            ]),
                    ]),

                Section::make('Detail Surat')
                    ->schema([
                        TextInput::make('nomor_surat')->label('Nomor Surat')->disabled(),
                        TextInput::make('nama_kegiatan')->label('Nama Kegiatan')->required(),
                        TextInput::make('nama_PJ')->label('Nama Penanggung Jawab')->required(),
                        TextInput::make('jabatan_PJ')->label('Jabatan Penanggung Jawab')->required(),
                        FileUpload::make('ttd_PJ')
                            ->label('Tanda Tangan PJ')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('ttd_PJ')
                            ->visibility('public'),
                        TextInput::make('narahubung')->label('Narahubung')->required(),
                        // FileUpload::make('qr_validasi')
                        //     ->label('QR Validasi')
                        //     ->disk('public')
                        //     ->directory('qr_validasi')
                        //     ->visibility('public')
                        //     ->disabled(),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('jamkerja.tgl')->label('Tanggal'),
                TextColumn::make('jamkerja.jam_mulai')->label('Jam Mulai'),
                TextColumn::make('jamkerja.jam_akhir')->label('Jam Akhir'),
                TextColumn::make('lokasi.nama_lokasi')->label('Alamat'),
                // TextColumn::make('lokasi.latitude')->label('Latitude'),
                // TextColumn::make('lokasi.longtitude')->label('Longtitude'),
                // TextColumn::make('lokasi.radius')->label('Radius'),
                TextColumn::make('nomor_surat')->label('Nomor Surat'),
                TextColumn::make('nama_kegiatan')->label('Nama Kegiatan'),
                TextColumn::make('nama_PJ')->label('Penanggung Jawab'),
                TextColumn::make('jabatan_PJ')->label('Jabatan PJ'),
                ImageColumn::make('ttd_PJ')->disk('public')->label('Tanda Tangan PJ'),
                TextColumn::make('narahubung')->label('Narahubung'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make("view_surat")
                    ->label("View Surat")
                    ->icon('heroicon-o-eye')
                    ->url(fn($record) => self::getUrl("view-surat", ['record' => $record->id]))
                    ->openUrlInNewTab(),
                Html2MediaAction::make('print')
                    ->icon('heroicon-o-printer')
                    ->openUrlInNewTab()
                    ->scale(2)
                    ->print() // Enable print option
                    ->preview() // Enable preview option
                    ->filename('invoice') // Custom file name
                    ->savePdf() // Enable save as PDF option
                    ->requiresConfirmation() // Show confirmation modal
                    ->pagebreak('section', ['css', 'legacy'])
                    ->orientation('portrait') // Portrait orientation
                    ->format('a4', 'mm') // A4 format with mm units
                    ->enableLinks() // Enable links in PDF
                    ->margin([10, 10, 10, 10]) // Set custom margins
                    ->content(fn($record) => view('reusable.surat_masuk.surat_masuk', ['surat' => $record])),
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
            CetakSuratRelationManager::make()
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSurats::route('/'),
            'create' => Pages\CreateSurat::route('/create'),
            'edit' => Pages\EditSurat::route('/{record}/edit'),
            'view-surat' => Pages\ViewSurat::route('/{record}/view-surat'),
        ];
    }
}
