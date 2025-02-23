<?php

namespace App\Models;

use App\Models\Lokasi;
use App\Models\JamKerja;
use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Surat extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'surats';

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_pengajuan', 'id');
    }

    public function jamkerja()
    {
        return $this->belongsTo(JamKerja::class, 'id_jam_kerja', 'id');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi', 'id');
    }
}
