@extends('layouts.app')

@section('content')

<div class="card-box">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

        <h2>Data Jadwal</h2>

        <a href="{{ route('jadwal.create') }}" class="btn btn-primary">
            + Tambah Jadwal
        </a>

    </div>

    @if(session('success'))
        <div style="background:#d1e7dd;padding:15px;border-radius:8px;margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    <table width="100%" border="0" cellspacing="0">

        <thead style="background:#0d6efd;color:white;">

        <tr>

            <th>No</th>
            <th>Kelas</th>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Ruangan</th>
            <th>Aksi</th>

        </tr>

        </thead>

        <tbody>

        @forelse($jadwals as $jadwal)

        <tr align="center">

            <td>{{ $loop->iteration }}</td>

            <td>{{ $jadwal->kelas->nama_kelas }}</td>

            <td>{{ $jadwal->mataKuliah->nama_mata_kuliah }}</td>

            <td>{{ $jadwal->dosen->nama }}</td>

            <td>{{ $jadwal->hari }}</td>

            <td>

                {{ $jadwal->jam_mulai }}

                -

                {{ $jadwal->jam_selesai }}

            </td>

            <td>{{ $jadwal->ruangan }}</td>

            <td>

                <a href="{{ route('jadwal.edit',$jadwal) }}" class="btn btn-warning">
                    Edit
                </a>

                <form action="{{ route('jadwal.destroy',$jadwal) }}"
                      method="POST"
                      style="display:inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger"
                        onclick="return confirm('Hapus jadwal?')">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="8" align="center">

                Belum ada jadwal

            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection