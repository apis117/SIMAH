@extends('layouts.app')

@section('content')

<div class="card-box">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

        <h2>Data Mata Kuliah</h2>

        <a href="{{ route('matakuliah.create') }}" class="btn btn-primary">
            + Tambah Mata Kuliah
        </a>

    </div>

    @if(session('success'))
        <div style="background:#d4edda;padding:12px;border-radius:5px;margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    <table width="100%" border="0" cellspacing="0">

        <thead style="background:#0d6efd;color:white;">

            <tr>

                <th style="padding:12px;">No</th>
                <th>Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

        @forelse($matakuliahs as $mk)

        <tr align="center">

            <td>{{ $loop->iteration }}</td>

            <td>{{ $mk->kode_mk }}</td>

            <td>{{ $mk->nama_mk }}</td>

            <td>{{ $mk->sks }}</td>

            <td>{{ $mk->semester }}</td>

            <td>

                <a href="{{ route('matakuliah.edit',$mk->id) }}"
                class="btn"
                style="background:orange;color:white;">
                Edit
                </a>

                <form
                action="{{ route('matakuliah.destroy',$mk->id) }}"
                method="POST"
                style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button
                    onclick="return confirm('Yakin ingin menghapus?')"
                    class="btn"
                    style="background:red;color:white;">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="6" align="center" style="padding:20px;">
                Belum ada data mata kuliah
            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection