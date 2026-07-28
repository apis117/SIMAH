@extends('layouts.app')

@section('content')

<div class="card-box">

    <h2>Edit Dosen</h2>

    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">

        @csrf
        @method('PUT')

        <label>NIDN</label>
        <input
            type="text"
            name="nidn"
            class="form-control"
            value="{{ old('nidn', $dosen->nidn) }}"
        >

        <label>Nama</label>
        <input
            type="text"
            name="nama"
            class="form-control"
            value="{{ old('nama', $dosen->nama) }}"
        >

        <label>Email</label>
        <input
            type="email"
            name="email"
            class="form-control"
            value="{{ old('email', $dosen->email) }}"
        >

        <label>No HP</label>
        <input
            type="text"
            name="no_hp"
            class="form-control"
            value="{{ old('no_hp', $dosen->no_hp) }}"
        >

        <label>Program Studi</label>
        <input
            type="text"
            name="prodi"
            class="form-control"
            value="{{ old('prodi', $dosen->prodi) }}"
        >

        <label>Status</label>

        <select name="status" class="form-control">

            <option value="Aktif"
                {{ $dosen->status == 'Aktif' ? 'selected' : '' }}>
                Aktif
            </option>

            <option value="Tidak Aktif"
                {{ $dosen->status == 'Tidak Aktif' ? 'selected' : '' }}>
                Tidak Aktif
            </option>

        </select>

        <br>

        <button type="submit" class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('dosen.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection