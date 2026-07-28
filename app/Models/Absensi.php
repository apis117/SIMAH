<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = [
        'jadwal_id',
        'mahasiswa_id',
        'tanggal',
        'status'
    ];

   public function mahasiswa()
{
    return $this->belongsTo(Mahasiswa::class);
}

public function jadwal()
{
    return $this->belongsTo(Jadwal::class);
}
}
