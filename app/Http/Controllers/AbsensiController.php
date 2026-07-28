<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with('kelas')->get();

        return view('absensi.index', compact('jadwals'));
    }

    public function create(Request $request)
    {
        $jadwal = Jadwal::with([
            'kelas',
            'mataKuliah',
            'dosen'
        ])->findOrFail($request->jadwal);

        $mahasiswas = Mahasiswa::orderBy('nama')->get();

        return view('absensi.create', compact(
            'jadwal',
            'mahasiswas'
        ));
    }

    public function store(Request $request)
    {
        foreach ($request->status as $mahasiswa_id => $status) {

            Absensi::create([
                'jadwal_id' => $request->jadwal_id,
                'mahasiswa_id' => $mahasiswa_id,
                'tanggal' => now()->toDateString(),
                'status' => $status,
            ]);
        }

        return redirect()
            ->route('absensi.index')
            ->with('success', 'Absensi berhasil disimpan.');
    }
}