<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedis;
use App\Models\RiwayatPenyakit;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index()
    {
        $pasien = Pasien::orderBy('id','desc')->paginate(10);
        $riwayat_penyakit = RiwayatPenyakit::all();
        return view('rekam-medis.index', compact('riwayat_penyakit', 'pasien'));
    }

    public function detail($id_pasien)
    {
        $detail = [];
        $riwayat_penyakit= RiwayatPenyakit::where('id_pasien', $id_pasien)->first();

        if($riwayat_penyakit){
            $detail = RiwayatPenyakit::where('id_pasien',$riwayat_penyakit->id_pasien)->get();
        }
        return view('rekam-medis.detail', compact('detail','riwayat_penyakit'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $pasien = Pasien::where('nama_pasien', 'like', "%" . $keyword . "%")->paginate(5);
        return view('rekam-medis.index', compact('pasien'));
    }
}
