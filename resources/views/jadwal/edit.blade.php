@extends('layouts.app')

@section('content')

<div class="card-box">

    <h2>Tambah Jadwal</h2>

    <form action="{{ route('jadwal.update',$jadwal) }}" method="POST">

    @csrf
    @method('PUT')
    
        <label>Kelas</label>

       <select name="kelas_id" class="form-control" required>

    <option value="">-- Pilih Kelas --</option>

    @foreach($kelas as $item)

        <option value="{{ $item->id }}"
            {{ $jadwal->kelas_id == $item->id ? 'selected' : '' }}>

            {{ $item->nama_kelas }}

        </option>

    @endforeach

</select>
        <label>Mata Kuliah</label>

        <select name="mata_kuliah_id" class="form-control" required>

    <option value="">-- Pilih Mata Kuliah --</option>

    @foreach($matakuliahs as $item)

        <option value="{{ $item->id }}"
            {{ $jadwal->mata_kuliah_id == $item->id ? 'selected' : '' }}>

            {{ $item->nama_mata_kuliah }}

        </option>

    @endforeach

</select>

        <label>Dosen</label>

        <select name="dosen_id" class="form-control" required>

    <option value="">-- Pilih Dosen --</option>

    @foreach($dosens as $item)

        <option value="{{ $item->id }}"
            {{ $jadwal->dosen_id == $item->id ? 'selected' : '' }}>

            {{ $item->nama }}

        </option>

    @endforeach

</select>

        <label>Hari</label>

        <select name="hari" class="form-control">

    <option value="Senin" {{ $jadwal->hari=='Senin' ? 'selected':'' }}>Senin</option>

    <option value="Selasa" {{ $jadwal->hari=='Selasa' ? 'selected':'' }}>Selasa</option>

    <option value="Rabu" {{ $jadwal->hari=='Rabu' ? 'selected':'' }}>Rabu</option>

    <option value="Kamis" {{ $jadwal->hari=='Kamis' ? 'selected':'' }}>Kamis</option>

    <option value="Jumat" {{ $jadwal->hari=='Jumat' ? 'selected':'' }}>Jumat</option>

    <option value="Sabtu" {{ $jadwal->hari=='Sabtu' ? 'selected':'' }}>Sabtu</option>

</select>

        <label>Jam Mulai</label>

        <input
type="time"
name="jam_mulai"
value="{{ $jadwal->jam_mulai }}"
class="form-control"
required>

        <label>Jam Selesai</label>

        <input
type="time"
name="jam_selesai"
value="{{ $jadwal->jam_selesai }}"
class="form-control"
required>

        <label>Ruangan</label>

        <input
type="text"
name="ruangan"
value="{{ $jadwal->ruangan }}"
class="form-control"
required>

        <br>

        <button class="btn btn-primary">

            Simpan

        </button>

        <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

@endsection