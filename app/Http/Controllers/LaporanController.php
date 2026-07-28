<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Absensi::with([
            'mahasiswa',
            'jadwal.kelas',
            'jadwal.mataKuliah'
        ])->latest()->get();

        return view('laporan.index', compact('laporans'));
    }

    public function pdf()
    {
        $laporans = Absensi::with([
            'mahasiswa',
            'jadwal.kelas',
            'jadwal.mataKuliah'
        ])->get();

        $pdf = Pdf::loadView('laporan.pdf', compact('laporans'));

        return $pdf->download('laporan-absensi.pdf');
    }
}