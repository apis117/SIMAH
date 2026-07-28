<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $matakuliahs = MataKuliah::latest()->get();

        return view('matakuliah.index', compact('matakuliahs'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:mata_kuliahs',
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
        ]);

        MataKuliah::create($request->only([
            'kode_mk',
            'nama_mk',
            'sks',
            'semester'
        ]));

        return redirect()
            ->route('matakuliah.index')
            ->with('success','Data mata kuliah berhasil ditambahkan.');
    }

    public function show(MataKuliah $matakuliah)
    {
        //
    }

    public function edit(MataKuliah $matakuliah)
    {
        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, MataKuliah $matakuliah)
    {
        $request->validate([
            'kode_mk' => 'required|unique:mata_kuliahs,kode_mk,' . $matakuliah->id,
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
        ]);

        $matakuliah->update($request->only([
            'kode_mk',
            'nama_mk',
            'sks',
            'semester'
        ]));

        return redirect()
            ->route('matakuliah.index')
            ->with('success','Data mata kuliah berhasil diubah.');
    }

    public function destroy(MataKuliah $matakuliah)
    {
        $matakuliah->delete();

        return redirect()
            ->route('matakuliah.index')
            ->with('success','Data mata kuliah berhasil dihapus.');
    }
}