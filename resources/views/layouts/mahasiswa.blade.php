<div class="sidebar">

<h2>SIMAH</h2>

<a href="{{ route('mahasiswa.dashboard') }}">
🏠 Dashboard
</a>

<a href="{{ route('mahasiswa.jadwal') }}">
📅 Jadwal Kuliah
</a>

<a href="{{ route('mahasiswa.absensi') }}">
✅ Riwayat Absensi
</a>

<form action="{{ route('logout') }}" method="POST">
@csrf

<button class="btn btn-danger">

Logout

</button>

</form>

</div>