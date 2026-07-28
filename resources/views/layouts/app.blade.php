    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SIMAH</title>

        @vite(['resources/css/app.css','resources/js/app.js'])
        

        <style>
            body{
                margin:0;
                background:#f4f6f9;
                font-family:Arial, Helvetica, sans-serif;
            }

            .sidebar{
                width:250px;
                height:100vh;
                background:#0d6efd;
                position:fixed;
                color:white;
            }

            .sidebar h2{
                text-align:center;
                padding:20px;
            }

            .sidebar a{
                display:block;
                color:white;
                text-decoration:none;
                padding:15px 20px;
            }

            .sidebar a:hover{
                background:#0b5ed7;
            }

            .content{
                margin-left:250px;
                padding:30px;
            }

            .topbar{
                background:white;
                padding:15px;
                border-radius:10px;
                margin-bottom:25px;
                box-shadow:0 2px 5px rgba(0,0,0,.1);
            }

            .card-box{
                background:white;
                border-radius:10px;
                padding:20px;
                box-shadow:0 2px 5px rgba(0,0,0,.1);
                text-align:center;
            }
                .form-control{
        width:100%;
        padding:10px 12px;
        margin-top:5px;
        margin-bottom:15px;
        border:1px solid #ced4da;
        border-radius:6px;
        box-sizing:border-box;
        font-size:15px;
    }

    .form-control:focus{
        outline:none;
        border-color:#0d6efd;
        box-shadow:0 0 5px rgba(13,110,253,.3);
    }

    .btn{
        display:inline-block;
        padding:10px 18px;
        border:none;
        border-radius:6px;
        cursor:pointer;
        text-decoration:none;
        font-size:15px;
    }

    .btn-primary{
        background:#0d6efd;
        color:white;
    }

    .btn-primary:hover{
        background:#0b5ed7;
    }

    .btn-secondary{
        background:#6c757d;
        color:white;
    }

    .btn-secondary:hover{
        background:#5c636a;
    }
    .btn-warning{
    background:#ffc107;
    color:black;
}

.btn-warning:hover{
    background:#e0a800;
}

.btn-danger{
    background:#dc3545;
    color:white;
}

.btn-danger:hover{
    background:#bb2d3b;
}

.btn-danger{
    background:#dc3545;
    color:white;
}

.btn-danger:hover{
    background:#bb2d3b;
}

        </style>

    </head>
    <body>

    <div class="sidebar">

        <h2>SIMAH</h2>

        <a href="{{ route('admin.dashboard') }}">🏠 Dashboard</a>
        <a href="{{ route('mahasiswa.index') }}">👨 Mahasiswa</a>
        <a href="{{ route('dosen.index') }}">👨‍🏫 Dosen</a>
        <a href="{{ route('matakuliah.index') }}">📚 Mata Kuliah</a>
        <a href="{{ route('kelas.index') }}">🏫 Kelas</a>
        <a href="{{ route('jadwal.index') }}">📅 Jadwal</a>
        <a href="{{ route('absensi.index') }}">✅ Absensi</a>
        <a href="{{ route('laporan.index') }}">📊 Laporan</a>

        <hr>

        <a href="#"
   onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
    🚪 Logout
</a>

<form id="logout-form"
      action="{{ route('logout') }}"
      method="POST"
      style="display:none;">
    @csrf
</form>

    </div>

    <div class="content">

        <div class="topbar">

            <h3>
                Sistem Informasi Absensi Mahasiswa
            </h3>

        </div>

        @yield('content')

    </div>

    </body>
    </html>