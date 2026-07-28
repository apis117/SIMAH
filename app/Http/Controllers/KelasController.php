<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with(['dosen','mataKuliah'])->latest()->get();

        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        $dosens = Dosen::all();
        $matakuliahs = MataKuliah::all();

        return view('kelas.create', compact('dosens','matakuliahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'tahun_ajaran' => 'required',
            'semester' => 'required|integer',
        ]);

        Kelas::create($request->only([
            'nama_kelas',
            'mata_kuliah_id',
            'dosen_id',
            'tahun_ajaran',
            'semester'
        ]));

        return redirect()
            ->route('kelas.index')
            ->with('success','Data kelas berhasil ditambahkan.');
    }

    public function show(Kelas $kelas)
    {
        //
    }

    public function edit(Kelas $kela)
    {
        $dosens = Dosen::all();
        $matakuliahs = MataKuliah::all();

        return view('kelas.edit', [
            'kelas' => $kela,
            'dosens' => $dosens,
            'matakuliahs' => $matakuliahs,
        ]);
    }

    public function update(Request $request, Kelas $kela)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'tahun_ajaran' => 'required',
            'semester' => 'required|integer',
        ]);

        $kela->update($request->only([
            'nama_kelas',
            'mata_kuliah_id',
            'dosen_id',
            'tahun_ajaran',
            'semester'
        ]));

        return redirect()
            ->route('kelas.index')
            ->with('success','Data kelas berhasil diubah.');
    }

    public function destroy(Kelas $kela)
    {
        $kela->delete();

        return redirect()
            ->route('kelas.index')
            ->with('success','Data kelas berhasil dihapus.');
    }
}