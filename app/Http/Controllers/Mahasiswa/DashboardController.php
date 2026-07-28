<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\Mahasiswa;

class DashboardController extends Controller
{
    public function index()
{
    dd('MASUK CONTROLLER');
}
    public function jadwal()
    {
        $jadwals = Jadwal::with([
            'kelas',
            'mataKuliah',
            'dosen'
        ])->get();

        return view('mahasiswa.jadwal', compact('jadwals'));
    }

    public function absensi()
    {
        $mahasiswa = Mahasiswa::where(
            'email',
            auth()->user()->email
        )->first();

        if (!$mahasiswa) {
            abort(404, 'Data mahasiswa tidak ditemukan.');
        }

        $absensis = Absensi::where('mahasiswa_id', $mahasiswa->id)
            ->with('jadwal.mataKuliah')
            ->get();

        return view('mahasiswa.absensi', compact('absensis'));
    }
}