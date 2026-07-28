<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'nim',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'prodi',
        'semester',
        'email',
        'no_hp',
        'alamat',
        'foto',
        'status',
    ];

    public function absensis()
{
    return $this->hasMany(Absensi::class);
}

}