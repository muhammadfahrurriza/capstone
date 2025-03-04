<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CetakSurat extends Model
{
    protected $fillable = [
        "surat_id",
        "user_id",
        "data"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function surat_id()
    {
        return $this->belongsTo(Surat::class);
    }
}
