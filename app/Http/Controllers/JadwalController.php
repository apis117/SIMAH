<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with(['kelas','mataKuliah','dosen'])->latest()->get();

        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $dosens = Dosen::all();
        $matakuliahs = MataKuliah::all();

        return view('jadwal.create', compact(
            'kelas',
            'dosens',
            'matakuliahs'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_id'=>'required',
            'mata_kuliah_id'=>'required',
            'dosen_id'=>'required',
            'hari'=>'required',
            'jam_mulai'=>'required',
            'jam_selesai'=>'required',
            'ruangan'=>'required',
        ]);

        Jadwal::create($request->all());

        return redirect()
            ->route('jadwal.index')
            ->with('success','Jadwal berhasil ditambahkan.');
    }

    public function edit(Jadwal $jadwal)
    {
        $kelas = Kelas::all();
        $dosens = Dosen::all();
        $matakuliahs = MataKuliah::all();

        return view('jadwal.edit', compact(
            'jadwal',
            'kelas',
            'dosens',
            'matakuliahs'
        ));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'kelas_id'=>'required',
            'mata_kuliah_id'=>'required',
            'dosen_id'=>'required',
            'hari'=>'required',
            'jam_mulai'=>'required',
            'jam_selesai'=>'required',
            'ruangan'=>'required',
        ]);

        $jadwal->update($request->all());

        return redirect()
            ->route('jadwal.index')
            ->with('success','Jadwal berhasil diubah.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()
            ->route('jadwal.index')
            ->with('success','Jadwal berhasil dihapus.');
    }
}