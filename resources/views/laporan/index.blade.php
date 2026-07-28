@extends('layouts.app')

@section('content')

<div class="card-box">

    <div style="display:flex;justify-content:space-between;align-items:center;">

        <h2>Laporan Absensi</h2>

        <a href="{{ route('laporan.pdf') }}" class="btn btn-danger">
            📄 Cetak PDF
        </a>

    </div>

    <br>

    <table width="100%">

        <tr style="background:#0d6efd;color:white">
            <th>No</th>
            <th>NIM</th>
            <th>Mahasiswa</th>
            <th>Kelas</th>
            <th>Mata Kuliah</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>

        @forelse($laporans as $laporan)

        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $laporan->mahasiswa->nim }}</td>
            <td>{{ $laporan->mahasiswa->nama }}</td>
            <td>{{ $laporan->jadwal->kelas->nama_kelas }}</td>
            <td>{{ $laporan->jadwal->mataKuliah->nama_mata_kuliah }}</td>
            <td>{{ $laporan->tanggal }}</td>
            <td>{{ $laporan->status }}</td>
        </tr>

        @empty

        <tr>
            <td colspan="7" align="center">
                Belum ada data
            </td>
        </tr>

        @endforelse

    </table>

</div>

@endsection