<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Surat;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SuratResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SuratResource\RelationManagers;

class SuratResource extends Resource
{
    protected static ?string $model = Surat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_jam_kerja')
                    ->relationship('jamkerja', 'tgl')
                    ->required(),
                Select::make('id_jam_kerja')
                    ->relationship('jamkerja', 'jam_mulai')
                    ->required(),
                Select::make('id_jam_kerja')
                    ->relationship('jamkerja', 'jam_akhir')
                    ->required(),
                Select::make('id_lokasi') // ✅ Menggunakan FK
                    ->relationship('lokasi', 'nama_lokasi')
                    ->required(),
                Select::make('id_lokasi')
                    ->relationship('lokasi', 'latitude')
                    ->required(),
                Select::make('id_lokasi')
                    ->relationship('lokasi', 'longtitude')
                    ->required(),
                Select::make('id_lokasi')
                    ->relationship('lokasi', 'radius')
                    ->required(),
                TextInput::make('nomor_surat')
                    ->required(),
                TextInput::make('nama_kegiatan')
                    ->required(),
                TextInput::make('nama_PJ')
                    ->required(),
                TextInput::make('jabatan_PJ')
                    ->required(),
                FileUpload::make('TTD_PJ')
                    ->image()
                    ->imageEditor()
                    ->required(),
                TextInput::make('narahubung')
                    ->required(),
                FileUpload::make('qr_validasi')
                    ->image()
                    ->imageEditor(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('jamkerja.tgl')
                    ->label('Tanggal'),
                TextColumn::make('jamkerja.jam_mulai')
                    ->label('Jam Mulai'),
                TextColumn::make('jamkerja.jam_selesai')
                    ->label('Jam Selesai'),
                TextColumn::make('lokasi.nama_lokasi')
                    ->label('lokasi'),
                TextColumn::make('lokasi.latitude')
                    ->label('latitude'),
                TextColumn::make('lokasi.longitude')
                    ->label('longtitude'),
                TextColumn::make('lokasi.radius')
                    ->label('Radius'),
                TextColumn::make('nomor_surat'),
                TextColumn::make('nama_kegiatan'),
                TextColumn::make('nama_PJ'),
                TextColumn::make('jabatan_PJ'),
                ImageColumn::make('ttd_Pj'),
                TextColumn::make('narahubung'),
                ImageColumn::make('qr_validasi'),
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
            'index' => Pages\ListSurats::route('/'),
            'create' => Pages\CreateSurat::route('/create'),
            'edit' => Pages\EditSurat::route('/{record}/edit'),
        ];
    }
}
