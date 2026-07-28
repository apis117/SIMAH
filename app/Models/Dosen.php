<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = [
        'nidn',
        'nama',
        'email',
        'no_hp',
        'prodi',
        'status',
    ];
    public function kelas()
{
    return $this->hasMany(Kelas::class);
}

public function jadwals()
{
    return $this->hasMany(Jadwal::class);
}
}