<?php

namespace App\Filament\Resources\SuratResource\Pages;

use App\Filament\Resources\SuratResource;
use App\Models\Surat;
use Filament\Resources\Pages\Page;
use Filament\Actions\Action;

class ViewSurat extends Page
{
    protected static string $resource = SuratResource::class;

    public $record;
    public $surat;

    public function mount($record)
    {
        // $this->record = $record;
        $this->surat = Surat::with(['jamkerja', 'lokasi'])->find($record);
        $this->record = Surat::findOrFail($record);
        // if (is_numeric($record)) {
        //     $this->record = Surat::findOrFail($record);
        // } else {
        //     // Jika $record sudah berupa objek, simpan saja
        //     $this->record = $record;
        // }
        // $this->surat = is_object($this->record) ? $this->record : Surat::find($this->record);
    }

    public function getHeaderActions(): array
    {
        return [
            Action::make('print')
                ->label("Print")
                ->icon('heroicon-o-printer')
                ->requiresConfirmation()
                ->url(route("PRINT.VIEW_SURAT", ['id' => $this->record->id]))
            // ->url(fn() => route("PRINT.VIEW_SURAT", [
            //     'id' => is_object($this->record) ? $this->record->id : $this->record
            // ]))
        ];
    }

    protected static string $view = 'filament.resources.surat-resource.pages.view-surat';
}
