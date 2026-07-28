@extends('layouts.app')

@section('content')

<div class="card-box">

<h2 align="center">Edit Mata Kuliah</h2>

<form
action="{{ route('matakuliah.update',$matakuliah->id) }}"
method="POST">

@csrf
@method('PUT')

<label>Kode Mata Kuliah</label>

<input
type="text"
name="kode_mk"
class="form-control"
value="{{ $matakuliah->kode_mk }}"
required>

<label>Nama Mata Kuliah</label>

<input
type="text"
name="nama_mk"
class="form-control"
value="{{ $matakuliah->nama_mk }}"
required>

<label>SKS</label>

<input
type="number"
name="sks"
class="form-control"
value="{{ $matakuliah->sks }}"
required>

<label>Semester</label>

<input
type="number"
name="semester"
class="form-control"
value="{{ $matakuliah->semester }}"
required>

<button class="btn btn-primary">
Update
</button>

<a
href="{{ route('matakuliah.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

@endsection