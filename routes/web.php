<?php

use App\Http\Controllers\InfoController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\RiwayatPenyakitController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//halaman utama login
Route::get('/', function () {
    return view('auth.login');
});

//disable register
Route::any('/register', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/info', InfoController::class)->middleware('auth');
Route::resource('/petugas', PetugasController::class)->middleware('auth');
Route::resource('/obat', ObatController::class)->middleware('auth');
Route::resource('/jabatan', JabatanController::class)->middleware('auth');
Route::resource('/pasien', PasienController::class)->middleware('auth');
Route::resource('/riwayat-penyakit', RiwayatPenyakitController::class)->middleware('auth');

Route::get('/rekam-medis', [RekamMedisController::class, 'index'])->name('rekam-medis.index')->middleware('auth');
Route::get('/detail-rekam-medis/{id_pasien}', [RekamMedisController::class, 'detail'])->name('rekam-medis.detail')->middleware('auth');
Route::get('/cari-rekam-medis', [RekamMedisController::class, 'search'])->name('rekam-medis.search')->middleware('auth');

Route::get('/rawat', [StatusController::class, 'index_rawat'])->middleware('auth');
Route::get('/rawat-jalan', [StatusController::class, 'index_rawat_jalan'])->middleware('auth');
