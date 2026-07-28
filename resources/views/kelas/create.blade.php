@extends('layouts.app')

@section('content')

<div class="card-box">

<h2 align="center">Tambah Kelas</h2>

<form action="{{ route('kelas.store') }}" method="POST">

@csrf

<label>Nama Kelas</label>

<input
type="text"
name="nama_kelas"
class="form-control"
required>

<label>Mata Kuliah</label>

<select
name="mata_kuliah_id"
class="form-control">

@foreach($matakuliahs as $mk)

<option value="{{ $mk->id }}">

{{ $mk->nama_mk }}

</option>

@endforeach

</select>

<label>Dosen</label>

<select
name="dosen_id"
class="form-control">

@foreach($dosens as $dosen)

<option value="{{ $dosen->id }}">

{{ $dosen->nama }}

</option>

@endforeach

</select>

<label>Semester</label>

<input
type="number"
name="semester"
class="form-control"
required>

<label>Tahun Ajaran</label>

<input
type="text"
name="tahun_ajaran"
placeholder="2026/2027"
class="form-control"
required>

<button class="btn btn-primary">

Simpan

</button>

<a
href="{{ route('kelas.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

@endsection