<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ SiswaController, GuruController, KelasController, IuranController, TransaksiController };

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
Route::post('/siswa', [SiswaController::class, 'store'])->name('add.siswa');
Route::get('/siswa/{id_siswa}/edit', [SiswaController::class, 'edit'])->name('edit.siswa');
Route::post('/siswa/{id_siswa}/edit', [SiswaController::class, 'update'])->name('update.siswa');
Route::delete('/siswa/{id_siswa}', [SiswaController::class, 'destroy'])->name('delete.siswa');

Route::get('/guru', [GuruController::class, 'index'])->name('guru');
Route::post('/guru', [GuruController::class, 'store'])->name('add.guru');
Route::get('/guru/{id_guru}/edit', [GuruController::class, 'edit'])->name('edit.guru');
Route::post('/guru/{id_guru}/edit', [GuruController::class, 'update'])->name('update.guru');
Route::delete('/guru/{id_guru}', [GuruController::class, 'destroy'])->name('delete.guru');
Route::get('/guru/{id_guru}/detail', [GuruController::class, 'show'])->name('detail.guru');

Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
Route::post('/kelas', [KelasController::class, 'store'])->name('add.kelas');
Route::get('/kelas/{id_kelas}/edit', [KelasController::class, 'edit'])->name('edit.kelas');
Route::delete('/kelas/{id_kelas}', [KelasController::class, 'destroy'])->name('delete.kelas');

Route::get('/iuran', [IuranController::class, 'index'])->name('iuran');
Route::post('/iuran', [IuranController::class, 'store'])->name('add.iuran');
Route::get('/iuran/{id_iuran}/edit', [IuranController::class, 'edit'])->name('edit.iuran');
Route::delete('/iuran/{id_iuran}', [IuranController::class, 'destroy'])->name('delete.iuran');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('add.transaksi');
Route::get('/transaksi/{id_transaksi}/edit', [TransaksiController::class, 'edit'])->name('edit.transaksi');
Route::delete('/transaksi/{id_transaksi}', [TransaksiController::class, 'destroy'])->name('delete.transaksi');
Route::get('/getSiswa/ajax/{id_siswa}', [TransaksiController::class, 'ajax']);

// Routes - Page //
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
