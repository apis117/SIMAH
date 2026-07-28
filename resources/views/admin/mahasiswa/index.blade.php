@extends('layouts.app')

@section('content')

<div class="card-box">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

        <h2>Data Mahasiswa</h2>

        <a href="{{ route('mahasiswa.create') }}"
           style="
                background:#0d6efd;
                color:white;
                padding:10px 18px;
                border-radius:8px;
                text-decoration:none;
           ">
            + Tambah Mahasiswa
        </a>

    </div>

    @if(session('success'))

        <div style="
            background:#d1e7dd;
            color:#0f5132;
            padding:10px;
            border-radius:8px;
            margin-bottom:20px;
        ">
            {{ session('success') }}
        </div>

    @endif

    <table width="100%" border="0" cellspacing="0">

        <thead>

            <tr style="background:#0d6efd;color:white;">

                <th style="padding:12px;">No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Semester</th>
                <th>Status</th>
                <th width="180">Aksi</th>

            </tr>

        </thead>

        <tbody>

        @forelse($mahasiswas as $m)

            <tr style="text-align:center;border-bottom:1px solid #ddd;">

                <td style="padding:12px;">
                    {{ $loop->iteration }}
                </td>

                <td>{{ $m->nim }}</td>

                <td>{{ $m->nama }}</td>

                <td>{{ $m->prodi }}</td>

                <td>{{ $m->semester }}</td>

                <td>{{ $m->status }}</td>

                <td>

                    <a href="{{ route('mahasiswa.edit',$m->id) }}"
                       style="
                       background:orange;
                       color:white;
                       padding:6px 10px;
                       text-decoration:none;
                       border-radius:5px;
                       ">
                       Edit
                    </a>

                    <form
                        action="{{ route('mahasiswa.destroy',$m->id) }}"
                        method="POST"
                        style="display:inline;"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Yakin ingin menghapus data ini?')"
                            style="
                            background:red;
                            color:white;
                            border:none;
                            padding:7px 10px;
                            border-radius:5px;
                            cursor:pointer;
                            "
                        >
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="7" style="padding:25px;text-align:center;">

                    Belum ada data mahasiswa

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

    <br>

    {{ $mahasiswas->links() }}

</div>

@endsection