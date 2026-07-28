@extends('layouts.app')

@section('content')

<div class="card-box">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

        <h2>Data Dosen</h2>

        <a href="{{ route('dosen.create') }}" class="btn btn-primary">
            + Tambah Dosen
        </a>

    </div>

    @if(session('success'))
        <div style="background:#d4edda;color:#155724;padding:12px;border-radius:6px;margin-bottom:15px;">
            {{ session('success') }}
        </div>
    @endif

    <table width="100%" border="0" cellspacing="0">

        <thead style="background:#0d6efd;color:white;">

        <tr>
            <th style="padding:12px;">No</th>
            <th>NIDN</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        </thead>

        <tbody>

        @forelse($dosens as $dosen)

        <tr align="center">

            <td>{{ $loop->iteration }}</td>

            <td>{{ $dosen->nidn }}</td>

            <td>{{ $dosen->nama }}</td>

            <td>{{ $dosen->prodi }}</td>

            <td>{{ $dosen->status }}</td>

            <td>

                <a href="{{ route('dosen.edit',$dosen->id) }}" class="btn btn-warning">
                    Edit
                </a>

                <form action="{{ route('dosen.destroy',$dosen->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger"
                            onclick="return confirm('Hapus data ini?')">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="6" align="center">

                Belum ada data dosen

            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection