<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Menampilkan daftar mahasiswa
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::latest()->paginate(10);

        return view('admin.mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Form tambah mahasiswa
     */
    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    /**
     * Simpan data mahasiswa
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'prodi' => 'required',
            'semester' => 'required',
            'email' => 'required|email|unique:mahasiswas',
            'no_hp' => 'nullable',
            'alamat' => 'nullable',
            'status' => 'required'
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Detail mahasiswa
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Form edit mahasiswa
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update mahasiswa
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'prodi' => 'required',
            'semester' => 'required',
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
            'status' => 'required'
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diubah.');
    }

    /**
     * Hapus mahasiswa
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}