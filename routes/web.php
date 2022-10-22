<?php

use App\Http\Controllers\InfoController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\MedicalCheckUpController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\DataSakitController;
use App\Http\Controllers\RiwayatPenyakitController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Select2Controller;
use App\Http\Controllers\StatusController;
use App\Models\Pasien;
use App\Models\RiwayatPenyakit;
use Illuminate\Http\Request;
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
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

//disable register
Route::any('/register', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

//halaman utama
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::resource('/info', InfoController::class)->middleware('auth');
Route::resource('/petugas', PetugasController::class)->middleware('auth');
Route::resource('/obat', ObatController::class)->middleware('auth');
Route::resource('/jabatan', JabatanController::class)->middleware('auth');
Route::resource('/pasien', PasienController::class)->middleware('auth');
Route::resource('/data-sakit', DataSakitController::class)->middleware('auth');
Route::resource('/riwayat-penyakit', RiwayatPenyakitController::class)->middleware('auth');
Route::resource('/medical-check-up', MedicalCheckUpController::class)->middleware('auth');

Route::get('/rekam-medis', [RekamMedisController::class, 'index'])->name('rekam-medis.index')->middleware('auth');
Route::get('/detail-rekam-medis/{id_pasien}', [RekamMedisController::class, 'detail'])->name('rekam-medis.detail')->middleware('auth');
Route::get('/print-rekam-medis/{id_pasien}', [RekamMedisController::class, 'print'])->name('rekam-medis.print')->middleware('auth');
Route::get('/cari-rekam-medis', [RekamMedisController::class, 'search'])->name('rekam-medis.search')->middleware('auth');

Route::get('/rawat', [StatusController::class, 'index_rawat'])->middleware('auth');
Route::get('/rawat-jalan', [StatusController::class, 'index_rawat_jalan'])->middleware('auth');
Route::get('/dirujuk', [StatusController::class, 'index_dirujuk'])->middleware('auth');
Route::get('/sembuh', [StatusController::class, 'index_sembuh'])->middleware('auth');

Route::get('/exportpasien', [PasienController::class, 'pasienExport'])->middleware('auth');
Route::post('/importpasien', [PasienController::class, 'pasienImport'])->name('pasienImport')->middleware('auth');
Route::post('/import-riwayat-penyakit', [RiwayatPenyakitController::class, 'riwayatPenyakitImport'])->name('riwayatPenyakitImport')->middleware('auth');

Route::get('search', [SearchController::class, 'index'])->name('search');
Route::get('autocomplete', [SearchController::class, 'autocomplete'])->name('autocomplete');