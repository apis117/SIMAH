@extends('layouts.app')

@section('content')

<div class="card-box">

<h2 align="center">Edit Kelas</h2>

<form
action="{{ route('kelas.update',$kelas->id) }}"
method="POST">

@csrf
@method('PUT')

<label>Nama Kelas</label>

<input
type="text"
name="nama_kelas"
value="{{ $kelas->nama_kelas }}"
class="form-control"
required>

<label>Mata Kuliah</label>

<select
name="mata_kuliah_id"
class="form-control">

@foreach($matakuliahs as $mk)

<option
value="{{ $mk->id }}"
{{ $kelas->mata_kuliah_id == $mk->id ? 'selected' : '' }}>

{{ $mk->nama_mk }}

</option>

@endforeach

</select>

<label>Dosen</label>

<select
name="dosen_id"
class="form-control">

@foreach($dosens as $dosen)

<option
value="{{ $dosen->id }}"
{{ $kelas->dosen_id == $dosen->id ? 'selected' : '' }}>

{{ $dosen->nama }}

</option>

@endforeach

</select>

<label>Semester</label>

<input
type="number"
name="semester"
value="{{ $kelas->semester }}"
class="form-control">

<label>Tahun Ajaran</label>

<input
type="text"
name="tahun_ajaran"
value="{{ $kelas->tahun_ajaran }}"
class="form-control">

<button class="btn btn-primary">

Update

</button>

<a
href="{{ route('kelas.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

@endsection