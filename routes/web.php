<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;

// Halaman awal
Route::get('/', fn () => view('welcome'))->name('welcome');

// ------------------- AUTH -------------------
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginProses'])->name('loginProses');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// ------------------- DASHBOARD -------------------
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ------------------- USER -------------------
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::get('create', [UserController::class, 'create'])->name('userCreate');
    Route::post('store', [UserController::class, 'store'])->name('userStore');
    Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('userDestroy');
});

// ------------------- JURUSAN -------------------
Route::prefix('jurusan')->group(function () {
    Route::get('/', [JurusanController::class, 'index'])->name('jurusan');
    Route::get('create', [JurusanController::class, 'create'])->name('jurusanCreate');
    Route::post('store', [JurusanController::class, 'store'])->name('jurusanStore');
    Route::get('edit/{id}', [JurusanController::class, 'edit'])->name('jurusanEdit');
    Route::post('update/{id}', [JurusanController::class, 'update'])->name('jurusanUpdate');
    Route::delete('destroy/{id}', [JurusanController::class, 'destroy'])->name('jurusanDestroy');
});

// ------------------- MATA PELAJARAN -------------------
Route::prefix('mapel')->group(function () {
    Route::get('/', [MapelController::class, 'index'])->name('mapel');
    Route::get('create', [MapelController::class, 'create'])->name('mapelCreate');
    Route::post('store', [MapelController::class, 'store'])->name('mapelStore');
    Route::get('edit/{id}', [MapelController::class, 'edit'])->name('mapelEdit');
    Route::post('update/{id}', [MapelController::class, 'update'])->name('mapelUpdate');
    Route::delete('destroy/{id}', [MapelController::class, 'destroy'])->name('mapelDestroy');
    Route::get('/kepala/mapel', [MapelController::class, 'kepalaIndex'])->name('kepalaMapel');
    Route::get('/kepala/mapel/export/excel', [MapelController::class, 'excel'])->name('mapelExportExcel');
    Route::get('/kepala/mapel/export/pdf', [MapelController::class, 'pdf'])->name('mapelExportPdf');
});

// ------------------- GURU -------------------
Route::prefix('guru')->group(function () {
    Route::get('/', [GuruController::class, 'index'])->name('guru');
    Route::get('create', [GuruController::class, 'create'])->name('guruCreate');
    Route::post('store', [GuruController::class, 'store'])->name('guruStore');
    Route::get('edit/{id}', [GuruController::class, 'edit'])->name('guruEdit');
    Route::put('update/{id}', [GuruController::class, 'update'])->name('guruUpdate');
    Route::delete('destroy/{id}', [GuruController::class, 'destroy'])->name('guruDestroy');
    Route::get('show/{id}', [GuruController::class, 'show'])->name('guruShow');
    Route::get('/kepala/guru', [GuruController::class, 'kepalaIndex'])->name('kepalaGuru');

    Route::get('/kepala/guru/export/excel', [GuruController::class, 'excel'])->name('guruExportExcel');
    Route::get('/kepala/guru/export/pdf', [GuruController::class, 'pdf'])->name('guruExportPdf');
});

// ------------------- KELAS -------------------
Route::prefix('kelas')->group(function () {
    Route::get('/', [KelasController::class, 'index'])->name('kelas');
    Route::get('create', [KelasController::class, 'create'])->name('kelasCreate');
    Route::post('store', [KelasController::class, 'store'])->name('kelasStore');
    Route::get('edit/{id}', [KelasController::class, 'edit'])->name('kelasEdit');
    Route::put('update/{id}', [KelasController::class, 'update'])->name('kelasUpdate');
    Route::delete('destroy/{id}', [KelasController::class, 'destroy'])->name('kelasDestroy');
    Route::get('/kepala/kelas', [KelasController::class, 'kepalaIndex'])->name('kepalaKelas');
    Route::get('/kepala/kelas/export/excel', [KelasController::class, 'excel'])->name('kelasExportExcel');
Route::get('/kepala/kelas/export/pdf', [KelasController::class, 'pdf'])->name('kelasExportPdf');
});

// ------------------- SISWA -------------------
Route::prefix('siswa')->group(function () {
    Route::get('/', [SiswaController::class, 'index'])->name('siswa');
    Route::get('create', [SiswaController::class, 'create'])->name('siswaCreate');
    Route::post('store', [SiswaController::class, 'store'])->name('siswaStore');
    Route::get('edit/{id}', [SiswaController::class, 'edit'])->name('siswaEdit');
    Route::put('update/{id}', [SiswaController::class, 'update'])->name('siswaUpdate');
    Route::delete('destroy/{id}', [SiswaController::class, 'destroy'])->name('siswaDestroy');
    Route::get('show/{id}', [SiswaController::class, 'show'])->name('siswaShow');
    Route::get('/kepsek/siswa', [SiswaController::class, 'kepsekIndex'])->name('kepsekSiswa')->middleware('auth');
    Route::get('/siswa/export-pdf', [SiswaController::class, 'exportPdf'])->name('kepsekSiswaExportPdf');
    Route::get('/siswa/export-excel', [SiswaController::class, 'exportExcel'])->name('kepsekSiswaExportExcel');

});

// ------------------- NILAI -------------------
Route::prefix('nilai')->group(function () {
    Route::get('/', [NilaiController::class, 'index'])->name('nilai');
    Route::get('create', [NilaiController::class, 'create'])->name('nilaiCreate');
    Route::post('store', [NilaiController::class, 'store'])->name('nilaiStore');
    Route::get('edit/{id}', [NilaiController::class, 'edit'])->name('nilaiEdit');
    Route::put('update/{id}', [NilaiController::class, 'update'])->name('nilaiUpdate');
    Route::delete('destroy/{id}', [NilaiController::class, 'destroy'])->name('nilaiDestroy');
    Route::get('show/{id}', [NilaiController::class, 'show'])->name('nilaiShow');

    
Route::get('/export-nilai/excel', [NilaiController::class, 'exportExcel'])->name('nilaiExportExcel');
Route::get('/export-nilai/pdf', [NilaiController::class, 'exportPdf'])->name('nilaiExportPdf');
Route::get('/nilai/export-excel-siswa', [NilaiController::class, 'exportExcelSiswa'])->name('nilaiExportExcelSiswa');
Route::get('/nilai/export-pdf-siswa', [NilaiController::class, 'exportPdfSiswa'])->name('nilaiExportPdfSiswa');

    Route::get('siswa', [NilaiController::class, 'nilaiSaya'])->name('nilaiSiswa');

    Route::get('siswa-by-kelas', [SiswaController::class, 'getByKelas'])->name('siswaByKelas');

    Route::get('/nilai-siswa', [NilaiController::class, 'nilaiSemua'])->name('nilaiSemua')->middleware('auth');
    

});
