<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Petugas;
use App\Models\RiwayatPenyakit;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index_rawat()
    {
        $riwayat_penyakit = RiwayatPenyakit::where('status_pasien', 'Rawat')->paginate(10);
        $pasien = Pasien::all();
        $petugas = Petugas::all();
        return view('status-pasien.rawat', compact('riwayat_penyakit', 'pasien','petugas'));
    }

    public function index_rawat_jalan()
    {
        $riwayat_penyakit = RiwayatPenyakit::where('status_pasien', 'Rawat Jalan')->paginate(10);
        $pasien = Pasien::all();
        $petugas = Petugas::all();
        return view('status-pasien.rawat-jalan', compact('riwayat_penyakit', 'pasien','petugas'));
    }
}
