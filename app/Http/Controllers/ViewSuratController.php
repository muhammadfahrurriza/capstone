<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CetakSurat;
use App\Models\Surat;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class ViewSuratController extends Controller
{
    /**
     * @param $id
     */
    public function printViewSurat($id)
    {
        // dd(auth()->user());
        $surat = Surat::with(['jamkerja', 'lokasi'])->find($id);
        if ($surat) {
            CetakSurat::create([
                "user_id" => Auth::id(),
                'surat_id' => $id
            ]);

            $pdf = PDF::loadView('pdf.view-surat', compact('surat'));
            return $pdf->stream();
        } else {
            Notification::make()
                ->title('Surat tidak ditemukan')
                ->message('Surat yang anda cari tidak ditemukan')
                ->send();
            return redirect()->back();
        }
    }
}
