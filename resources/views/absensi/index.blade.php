@extends('layouts.app')

@section('content')

<div class="card-box">

    <div style="display:flex;justify-content:space-between">

        <h2>Absensi Mahasiswa</h2>

        <div style="display:flex;justify-content:space-between">

    <h2>Absensi Mahasiswa</h2>

</div>

    </div>

    <br>

    <table width="100%">

        <tr style="background:#0d6efd;color:white">

            <th>No</th>
            <th>Kelas</th>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Hari</th>
            <th>Aksi</th>

        </tr>

        @forelse($jadwals as $jadwal)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $jadwal->kelas->nama_kelas }}</td>

            <td>{{ $jadwal->mataKuliah->nama_mata_kuliah }}</td>

            <td>{{ $jadwal->dosen->nama }}</td>

            <td>{{ $jadwal->hari }}</td>

            <td>

                <a
                href="{{ route('absensi.create',['jadwal'=>$jadwal->id]) }}"
                class="btn btn-primary">

                Isi Absensi

                </a>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="6" align="center">

                Belum ada jadwal

            </td>

        </tr>

        @endforelse

    </table>

</div>

@endsection