<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\Absensi;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'mahasiswa'  => Mahasiswa::count(),
            'dosen'      => Dosen::count(),
            'matakuliah' => MataKuliah::count(),
            'kelas'      => Kelas::count(),
            'jadwal'     => Jadwal::count(),
            'absensi'    => Absensi::count(),
        ]);
    }
}