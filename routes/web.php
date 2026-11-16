<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllerAnyelir;
use App\Http\Controllers\SiswaControllerAnyelir;
use App\Http\Controllers\PelajaranControllerAnyelir;
use App\Http\Controllers\KurikulumControllerAnyelir;
use App\Http\Controllers\KelasControllerAnyelir;
use App\Http\Controllers\JadwalControllerAnyelir;
use App\Http\Controllers\NilaiControllerAnyelir;

// Route Login & Logout
Route::get('/login', [AuthControllerAnyelir::class, 'showLogin'])->name('login');
Route::post('/login', [AuthControllerAnyelir::class, 'login']);
Route::post('/logout', [AuthControllerAnyelir::class, 'logout']);

// Halaman utama diarahkan ke login
Route::get('/', function () {
    return redirect('/login');
});

// Route Modul Akademik (Dilindungi Session Login)
Route::middleware(['web'])->group(function () {
    // 1. Siswa
    Route::get('/siswa', [SiswaControllerAnyelir::class, 'index']);
    Route::get('/siswa/tambah', [SiswaControllerAnyelir::class, 'create']);
    Route::post('/siswa', [SiswaControllerAnyelir::class, 'store']);
    Route::get('/siswa/{id}/edit', [SiswaControllerAnyelir::class, 'edit']);
    Route::put('/siswa/{id}', [SiswaControllerAnyelir::class, 'update']);
    Route::delete('/siswa/{id}', [SiswaControllerAnyelir::class, 'destroy']);
    Route::get('/siswa/pdf', [SiswaControllerAnyelir::class, 'cetakPdf']);

    // 2. Pelajaran
    Route::get('/pelajaran', [PelajaranControllerAnyelir::class, 'index']);
    Route::get('/pelajaran/tambah', [PelajaranControllerAnyelir::class, 'create']);
    Route::post('/pelajaran', [PelajaranControllerAnyelir::class, 'store']);
    Route::get('/pelajaran/{id}/edit', [PelajaranControllerAnyelir::class, 'edit']);
    Route::put('/pelajaran/{id}', [PelajaranControllerAnyelir::class, 'update']);
    Route::delete('/pelajaran/{id}', [PelajaranControllerAnyelir::class, 'destroy']);
    Route::get('/pelajaran/pdf', [PelajaranControllerAnyelir::class, 'cetakPdf']);

    // 3. Kurikulum
    Route::get('/kurikulum', [KurikulumControllerAnyelir::class, 'index']);
    Route::get('/kurikulum/tambah', [KurikulumControllerAnyelir::class, 'create']);
    Route::post('/kurikulum', [KurikulumControllerAnyelir::class, 'store']);
    Route::get('/kurikulum/{id}/edit', [KurikulumControllerAnyelir::class, 'edit']);
    Route::put('/kurikulum/{id}', [KurikulumControllerAnyelir::class, 'update']);
    Route::delete('/kurikulum/{id}', [KurikulumControllerAnyelir::class, 'destroy']);
    Route::get('/kurikulum/pdf', [KurikulumControllerAnyelir::class, 'cetakPdf']);

    // 4. Kelas
    Route::get('/kelas', [KelasControllerAnyelir::class, 'index']);
    Route::get('/kelas/tambah', [KelasControllerAnyelir::class, 'create']);
    Route::post('/kelas', [KelasControllerAnyelir::class, 'store']);
    Route::get('/kelas/{id}/edit', [KelasControllerAnyelir::class, 'edit']);
    Route::put('/kelas/{id}', [KelasControllerAnyelir::class, 'update']);
    Route::delete('/kelas/{id}', [KelasControllerAnyelir::class, 'destroy']);
    Route::get('/kelas/pdf', [KelasControllerAnyelir::class, 'cetakPdf']);

    // 5. Jadwal
    Route::get('/jadwal', [JadwalControllerAnyelir::class, 'index']);
    Route::get('/jadwal/tambah', [JadwalControllerAnyelir::class, 'create']);
    Route::post('/jadwal', [JadwalControllerAnyelir::class, 'store']);
    Route::get('/jadwal/{id}/edit', [JadwalControllerAnyelir::class, 'edit']);
    Route::put('/jadwal/{id}', [JadwalControllerAnyelir::class, 'update']);
    Route::delete('/jadwal/{id}', [JadwalControllerAnyelir::class, 'destroy']);
    Route::get('/jadwal/pdf', [JadwalControllerAnyelir::class, 'cetakPdf']);

    // 6. Nilai
    Route::get('/nilai', [NilaiControllerAnyelir::class, 'index']);
    Route::get('/nilai/tambah', [NilaiControllerAnyelir::class, 'create']);
    Route::post('/nilai', [NilaiControllerAnyelir::class, 'store']);
    Route::get('/nilai/{id}/edit', [NilaiControllerAnyelir::class, 'edit']);
    Route::put('/nilai/{id}', [NilaiControllerAnyelir::class, 'update']);
    Route::delete('/nilai/{id}', [NilaiControllerAnyelir::class, 'destroy']);
    Route::get('/nilai/pdf', [NilaiControllerAnyelir::class, 'cetakPdf']);
});