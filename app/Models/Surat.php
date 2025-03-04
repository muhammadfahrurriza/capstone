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
    // protected $fillable = [
    //     'id_jam_kerja',
    //     'id_lokasi',
    //     'nomor_surat',
    //     'nama_kegiatan',
    //     'nama_PJ',
    //     'jabatan_PJ',
    //     'TTD_PJ',
    //     'narahubung',
    //     'qr_validasi'
    // ];
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

    public function CetakSurat()
    {
        return $this->hasMany(CetakSurat::class, 'surat_id', 'id');
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($surat) {
    //         $surat->id_jam_kerja = JamKerja::latest('id')->value('id');
    //         $surat->id_lokasi = Lokasi::latest('id')->value('id');
    //     });
    // }
}
