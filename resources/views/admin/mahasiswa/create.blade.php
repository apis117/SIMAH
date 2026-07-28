@extends('layouts.app')

@section('content')

<div class="card-box">

<h2>Tambah Mahasiswa</h2>

<form action="{{ route('mahasiswa.store') }}" method="POST">

@csrf

<br>

<label>NIM</label>

<input type="text"
name="nim"
class="form-control">

<br>

<label>Nama</label>

<input type="text"
name="nama"
class="form-control">

<br>

<label>Jenis Kelamin</label>

<select
name="jenis_kelamin"
class="form-control">

<option>Laki-laki</option>

<option>Perempuan</option>

</select>

<br>

<label>Tempat Lahir</label>

<input type="text"
name="tempat_lahir"
class="form-control">

<br>

<label>Tanggal Lahir</label>

<input type="date"
name="tanggal_lahir"
class="form-control">

<br>

<label>Program Studi</label>

<input type="text"
name="prodi"
class="form-control">

<br>

<label>Semester</label>

<input type="number"
name="semester"
class="form-control">

<br>

<label>Email</label>

<input type="email"
name="email"
class="form-control">

<br>

<label>No HP</label>

<input type="text"
name="no_hp"
class="form-control">

<br>

<label>Alamat</label>

<textarea
name="alamat"
class="form-control"></textarea>

<br>

<label>Status</label>

<select
name="status"
class="form-control">

<option>Aktif</option>

<option>Cuti</option>

<option>Lulus</option>

</select>

<br><br>

<button
class="btn btn-primary">

Simpan

</button>

<a
href="{{ route('mahasiswa.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

@endsection