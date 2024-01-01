<?php

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;

// Rute untuk Auth
Route::get('/', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register/post', [AuthController::class, 'register'])->middleware('guest')->name('register.post');

// Rute untuk Dashboard
Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/bagPem', [HomeController::class, 'bagPem'])->name('homebagPem.home');
Route::get('/bagPB', [HomeController::class, 'bagPB'])->name('homebagPB.home');

// Rute untuk Petugas
Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.petugas');
Route::get('/petugas/tambah', [PetugasController::class, 'create'])->name('petugas.tambah');
Route::post('/petugas', [PetugasController::class, 'store'])->name('petugas.store');
Route::get('/petugas/{id}/edit', [PetugasController::class, 'edit'])->name('petugas.edit');
Route::put('/petugas/{id}', [PetugasController::class, 'update'])->name('petugas.update');
Route::delete('/petugas/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');

// Rute untuk Rak
Route::get('/rak', [BukuController::class, 'rakIndex'])->name('rak.index');
Route::get('/rak/create', [BukuController::class, 'rakCreate'])->name('rak.create');
Route::post('/rak/store', [BukuController::class, 'rakStore'])->name('rak.store');
Route::delete('/rak/destroy/{id}', [BukuController::class, 'rakDestroy'])->name('rak.destroy');
Route::get('/rak/edit/{id}', [BukuController::class, 'rakEdit'])->name('rak.edit');
Route::put('/rak/update/{id}', [BukuController::class, 'rakUpdate'])->name('rak.update');

// Route::resource('raks', RakController::class);

// Rute untuk buku
Route::get('/buku', [BukuController::class, 'bukuIndex'])->name('buku.index');
Route::get('/buku/create', [BukuController::class, 'bukuCreate'])->name('buku.create');
Route::post('/buku/store', [BukuController::class, 'bukuStore'])->name('buku.store');
Route::delete('/buku/destroy/{id}', [BukuController::class, 'bukuDestroy'])->name('buku.destroy');
Route::get('/buku/edit/{id}', [BukuController::class, 'bukuEdit'])->name('buku.edit');
Route::put('/buku/update/{id}', [BukuController::class, 'bukuUpdate'])->name('buku.update');

// Rute untuk Kategori
Route::get('/kategori', [BukuController::class, 'kategoriIndex'])->name('kategori.index');
Route::get('/kategori/create', [BukuController::class, 'kategoriCreate'])->name('kategori.create');
Route::post('/kategori/store', [BukuController::class, 'kategoriStore'])->name('kategori.store');
Route::delete('/kategori/destroy/{id}', [BukuController::class, 'kategoriDestroy'])->name('kategori.destroy');
Route::get('/kategori/edit/{id}', [BukuController::class, 'kategoriEdit'])->name('kategori.edit');
Route::put('/kategori/update/{id}', [BukuController::class, 'kategoriUpdate'])->name('kategori.update');

// Rute untuk Penerbit
Route::get('/penerbit', [BukuController::class, 'penerbitIndex'])->name('penerbit.index');
Route::get('/penerbit/create', [BukuController::class, 'penerbitCreate'])->name('penerbit.create');
Route::post('/penerbit/store', [BukuController::class, 'penerbitStore'])->name('penerbit.store');
Route::delete('/penerbit/destroy/{id}', [BukuController::class, 'penerbitDestroy'])->name('penerbit.destroy');
Route::get('/penerbit/edit/{id}', [BukuController::class, 'penerbitEdit'])->name('penerbit.edit');
Route::put('/penerbit/update/{id}', [BukuController::class, 'penerbitUpdate'])->name('penerbit.update');

// Rute untuk Penulis
Route::get('/penulis', [PenulisController::class, 'index'])->name('penulis.penulis');
Route::get('/penulis/create', [PenulisController::class, 'create'])->name('penulis.create');
Route::post('/penulis/store', [PenulisController::class, 'store'])->name('penulis.store');
Route::get('/penulis/edit/{id}', [PenulisController::class, 'edit_penulis'])->name('penulis.edit');

// Rute untuk Anggota
Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.anggota');
Route::get('/anggota/tambah', [AnggotaController::class, 'create'])->name('anggota.tambah');
Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');
Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::put('/anggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');

// Rute untuk Peminjaman
Route::get('/peminjaman', [PeminjamanController::class, 'peminjaman'])->name('peminjaman.peminjaman');
Route::get('/peminjaman/tambah', [PeminjamanController::class, 'tambahPeminjaman'])->name('peminjaman.tambahPeminjaman');
Route::get('/denda', [PeminjamanController::class, 'denda'])->name('denda.denda');
