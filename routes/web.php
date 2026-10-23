<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporBanjirController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendaftaranSiswaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SmartEduController;

Route::get('/laporbanjir', [LaporBanjirController::class, 'form'])->name('laporbanjir.form');
Route::post('/laporbanjir/kirim', [LaporBanjirController::class, 'kirim'])->name('laporbanjir.kirim');

Route::get('/laporbanjir/register', [RegisterController::class, 'form'])->name('laporbanjir.register');
Route::post('/laporbanjir/register', [RegisterController::class, 'register'])->name('laporbanjir.register.submit');

Route::get('/laporbanjir/login', [LoginController::class, 'form'])->name('laporbanjir.login');
Route::post('/laporbanjir/login', [LoginController::class, 'login'])->name('laporbanjir.login.submit');

Route::middleware('auth')->group(function () {
    Route::get('/laporbanjir/daftar', [LaporBanjirController::class, 'daftar'])->name('laporbanjir.daftar');
    Route::get('/laporbanjir/profil', [LoginController::class, 'profile'])->name('laporbanjir.profile');
    Route::post('/laporbanjir/logout', [LoginController::class, 'logout'])->name('laporbanjir.logout');
});

// Halaman utama / landing
Route::get('/', [SmartEduController::class, 'landing'])->name('home');

// Auth
Route::get('/smartedu/login', [SmartEduController::class, 'loginForm'])->name('smartedu.login');
Route::get('/login', [LoginController::class, 'form'])->name('login');

// Halaman internal SmartEdu hanya dapat diakses setelah login.
Route::middleware('auth')->group(function () {
    // Dashboard per role
    Route::get('/staff-tu/dashboard', [SmartEduController::class, 'staffDashboard'])->name('staff-tu.dashboard');
    Route::get('/guru/dashboard', [SmartEduController::class, 'guruDashboard'])->name('guru.dashboard');
    Route::get('/siswa/dashboard', [SmartEduController::class, 'siswaDashboard'])->name('siswa.dashboard');
    Route::get('/orang-tua/dashboard', [SmartEduController::class, 'orangTuaDashboard'])->name('orang-tua.dashboard');

    // Staff TU — Manajemen Pengguna
    Route::get('/staff-tu/pengguna', [SmartEduController::class, 'pengguna'])->name('staff-tu.pengguna');

    // Staff TU — Manajemen Kelas
    Route::get('/staff-tu/kelas', [SmartEduController::class, 'kelas'])->name('staff-tu.kelas');

    // Staff TU — Manajemen Mata Pelajaran
    Route::get('/staff-tu/mapel', [SmartEduController::class, 'mapel'])->name('staff-tu.mapel');

    // Siswa — Materi
    Route::get('/siswa/materi', [SmartEduController::class, 'materi'])->name('siswa.materi');
    Route::get('/siswa/materi/{kodeMateri}', [SmartEduController::class, 'detailMateri'])->name('siswa.materi.detail');

    // Siswa — Latihan
    Route::get('/siswa/latihan', [SmartEduController::class, 'latihan'])->name('siswa.latihan');
    Route::get('/siswa/latihan/{kodeMateri}', [SmartEduController::class, 'detailLatihan'])->name('siswa.latihan.detail');
});

Route::get('/pendaftaran', [PendaftaranSiswaController::class, 'form'])->name('pendaftaran.form');
Route::post('/pendaftaran/proses', [PendaftaranSiswaController::class, 'proses'])->name('pendaftaran.proses');
