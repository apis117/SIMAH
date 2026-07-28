@extends('layouts.app')

@section('content')

<div class="card-box">

<h2>Tambah Dosen</h2>

<form action="{{ route('dosen.store') }}" method="POST">

@csrf

<label>NIDN</label>
<input type="text" name="nidn" class="form-control">

<label>Nama</label>
<input type="text" name="nama" class="form-control">

<label>Email</label>
<input type="email" name="email" class="form-control">

<label>No HP</label>
<input type="text" name="no_hp" class="form-control">

<label>Program Studi</label>
<input type="text" name="prodi" class="form-control">

<label>Status</label>

<select name="status" class="form-control">
    <option value="Aktif">Aktif</option>
    <option value="Tidak Aktif">Tidak Aktif</option>
</select>

<br>

<button class="btn btn-primary">
    Simpan
</button>

<a href="{{ route('dosen.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

@endsection