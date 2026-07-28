<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester',
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