@extends('layouts.app')

@section('content')

<div class="card-box">

<h2 align="center">Tambah Mata Kuliah</h2>

<form action="{{ route('matakuliah.store') }}" method="POST">

@csrf

<label>Kode Mata Kuliah</label>

<input
type="text"
name="kode_mk"
class="form-control"
required>

<label>Nama Mata Kuliah</label>

<input
type="text"
name="nama_mk"
class="form-control"
required>

<label>SKS</label>

<input
type="number"
name="sks"
class="form-control"
required>

<label>Semester</label>

<input
type="number"
name="semester"
class="form-control"
required>

<button class="btn btn-primary">
Simpan
</button>

<a href="{{ route('matakuliah.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

@endsection