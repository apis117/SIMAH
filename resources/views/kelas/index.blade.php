@extends('layouts.app')

@section('content')

<div class="card-box">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

        <h2>Data Kelas</h2>

        <a href="{{ route('kelas.create') }}" class="btn btn-primary">
            + Tambah Kelas
        </a>

    </div>

    @if(session('success'))

        <div style="background:#d4edda;padding:12px;border-radius:5px;margin-bottom:20px;">

            {{ session('success') }}

        </div>

    @endif

    <table width="100%" cellspacing="0">

        <thead style="background:#0d6efd;color:white;">

        <tr>

            <th>No</th>
            <th>Nama Kelas</th>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Semester</th>
            <th>Tahun Ajaran</th>
            <th>Aksi</th>

        </tr>

        </thead>

        <tbody>

        @forelse($kelas as $k)

        <tr align="center">

            <td>{{ $loop->iteration }}</td>

            <td>{{ $k->nama_kelas }}</td>

            <td>{{ $k->mataKuliah->nama_mk }}</td>

            <td>{{ $k->dosen->nama }}</td>

            <td>{{ $k->semester }}</td>

            <td>{{ $k->tahun_ajaran }}</td>

            <td>

                <a
                href="{{ route('kelas.edit',$k->id) }}"
                class="btn"
                style="background:orange;color:white;">
                Edit
                </a>

                <form
                action="{{ route('kelas.destroy',$k->id) }}"
                method="POST"
                style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button
                    onclick="return confirm('Yakin?')"
                    class="btn"
                    style="background:red;color:white;">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="7" align="center">

                Belum ada data kelas

            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection