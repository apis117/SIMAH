<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('mahasiswa', MahasiswaController::class);

    Route::resource('dosen', DosenController::class);

    Route::resource('matakuliah', MataKuliahController::class);

    Route::resource('kelas', KelasController::class);

    Route::resource('jadwal', JadwalController::class);

    Route::resource('absensi', AbsensiController::class);

    Route::resource('laporan', LaporanController::class)->only('index');

    Route::get('/laporan/pdf', [LaporanController::class, 'pdf'])
    ->name('laporan.pdf');

});

Route::middleware(['auth','role:mahasiswa'])->group(function () {

    Route::get('/mahasiswa/dashboard',
        [MahasiswaDashboardController::class,'index'])
        ->name('mahasiswa.dashboard');

    Route::get('/mahasiswa/jadwal',
        [MahasiswaDashboardController::class,'jadwal'])
        ->name('mahasiswa.jadwal');

    Route::get('/mahasiswa/absensi',
        [MahasiswaDashboardController::class,'absensi'])
        ->name('mahasiswa.absensi');

});

Route::get('/dashboard', function () {

    if (auth()->user()->role == 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('mahasiswa.dashboard');

})->middleware('auth')->name('dashboard');

require __DIR__.'/auth.php';