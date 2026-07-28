@extends('layouts.admin')

@section('content')

<h2>Dashboard Admin</h2>

<br>

<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">

    <div class="card-box">
        <h3>👨‍🎓 Mahasiswa</h3>
        <h1>{{ $mahasiswa }}</h1>
    </div>

    <div class="card-box">
        <h3>👨‍🏫 Dosen</h3>
        <h1>{{ $dosen }}</h1>
    </div>

    <div class="card-box">
        <h3>📚 Mata Kuliah</h3>
        <h1>{{ $matakuliah }}</h1>
    </div>

    <div class="card-box">
        <h3>🏫 Kelas</h3>
        <h1>{{ $kelas }}</h1>
    </div>

    <div class="card-box">
        <h3>📅 Jadwal</h3>
        <h1>{{ $jadwal }}</h1>
    </div>

    <div class="card-box">
        <h3>✅ Absensi</h3>
        <h1>{{ $absensi }}</h1>
    </div>

</div>

@endsection