<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::latest()->get();

        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosens',
            'nama' => 'required',
            'email' => 'required|email|unique:dosens',
            'no_hp' => 'nullable',
            'prodi' => 'required',
            'status' => 'required'
        ]);

       Dosen::create($request->only([
    'nidn',
    'nama',
    'email',
    'no_hp',
    'prodi',
    'status',
]));

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function show(Dosen $dosen)
    {
        //
    }

    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nidn' => 'required|unique:dosens,nidn,' . $dosen->id,
            'nama' => 'required',
            'email' => 'required|email|unique:dosens,email,' . $dosen->id,
            'no_hp' => 'nullable',
            'prodi' => 'required',
            'status' => 'required'
        ]);

       $dosen->update($request->only([
    'nidn',
    'nama',
    'email',
    'no_hp',
    'prodi',
    'status',
]));

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil diubah.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil dihapus.');
    }
}