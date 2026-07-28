<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body{
            font-family: DejaVu Sans;
            font-size:12px;
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table, th, td{
            border:1px solid black;
        }

        th{
            background:#eeeeee;
        }

        th,td{
            padding:8px;
            text-align:center;
        }
    </style>
</head>
<body>

<h2>LAPORAN ABSENSI MAHASASISWA</h2>

<table>

<tr>
    <th>No</th>
    <th>NIM</th>
    <th>Mahasiswa</th>
    <th>Kelas</th>
    <th>Mata Kuliah</th>
    <th>Tanggal</th>
    <th>Status</th>
</tr>

@foreach($laporans as $laporan)

<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $laporan->mahasiswa->nim }}</td>
    <td>{{ $laporan->mahasiswa->nama }}</td>
    <td>{{ $laporan->jadwal->kelas->nama_kelas }}</td>
    <td>{{ $laporan->jadwal->mataKuliah->nama_mata_kuliah }}</td>
    <td>{{ $laporan->tanggal }}</td>
    <td>{{ $laporan->status }}</td>
</tr>

@endforeach

</table>

</body>
</html>