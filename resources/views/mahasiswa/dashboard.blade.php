@extends('layouts.mahasiswa')

@section('content')

<h2>Dashboard Mahasiswa</h2>

<div class="card-box">

    <h3>👋 Selamat Datang</h3>

    <hr>

    <table width="100%">

        <tr>
            <td width="180"><b>Nama</b></td>
            <td>: {{ $mahasiswa->nama ?? auth()->user()->name }}</td>
        </tr>

        <tr>
            <td><b>NIM</b></td>
            <td>: {{ $mahasiswa->nim ?? '-' }}</td>
        </tr>

        <tr>
            <td><b>Program Studi</b></td>
            <td>: {{ $mahasiswa->prodi ?? '-' }}</td>
        </tr>

        <tr>
            <td><b>Semester</b></td>
            <td>: {{ $mahasiswa->semester ?? '-' }}</td>
        </tr>

        <tr>
            <td><b>Status</b></td>
            <td>: {{ $mahasiswa->status ?? '-' }}</td>
        </tr>

    </table>

</div>

<br>

<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;">

    <div class="card-box" style="text-align:center;">
        <h4>📚 Mata Kuliah</h4>
        <h2>{{ $jumlahMatkul }}</h2>
    </div>

    <div class="card-box" style="text-align:center;">
        <h4>✅ Hadir</h4>
        <h2>{{ $jumlahHadir }}</h2>
    </div>

    <div class="card-box" style="text-align:center;">
        <h4>🟡 Izin</h4>
        <h2>{{ $jumlahIzin }}</h2>
    </div>

    <div class="card-box" style="text-align:center;">
        <h4>🔴 Alfa</h4>
        <h2>{{ $jumlahAlfa }}</h2>
    </div>

</div>

@endsection