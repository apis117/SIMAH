@extends('layouts.app')

@section('content')

<div class="card-box">

    <h2>Input Absensi</h2>

    <br>

    <h4>
        {{ $jadwal->mataKuliah->nama_mata_kuliah }}
    </h4>

    <p>

        <b>Kelas :</b> {{ $jadwal->kelas->nama_kelas }}

        |

        <b>Dosen :</b> {{ $jadwal->dosen->nama }}

        |

        <b>Hari :</b> {{ $jadwal->hari }}

    </p>

    <hr>

    <form action="{{ route('absensi.store') }}" method="POST">

        @csrf

        <input
            type="hidden"
            name="jadwal_id"
            value="{{ $jadwal->id }}"
        >

        <table width="100%" cellpadding="10">

            <tr style="background:#0d6efd;color:white">

                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Status Kehadiran</th>

            </tr>

            @foreach($mahasiswas as $mhs)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $mhs->nim }}</td>

                <td>{{ $mhs->nama }}</td>

                <td>

                    <select
                        name="status[{{ $mhs->id }}]"
                        class="form-control"
                    >

                        <option value="Hadir">Hadir</option>

                        <option value="Izin">Izin</option>

                        <option value="Sakit">Sakit</option>

                        <option value="Alfa">Alfa</option>

                    </select>

                </td>

            </tr>

            @endforeach

        </table>

        <br>

        <button class="btn btn-primary">

            Simpan Absensi

        </button>

        <a href="{{ route('absensi.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

@endsection