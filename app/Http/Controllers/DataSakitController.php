<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Petugas;
use App\Models\RekamMedis;
use App\Models\DataSakit;
use App\Models\KategoriPenyakit;
use App\Models\NamaKategoriPenyakit;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_sakit = DataSakit::orderBy('updated_at', 'desc')->paginate(10);
        $pasien = Pasien::all();
        $petugas = Petugas::all();
        $obat = Obat::all();
        return view('data_sakit.index', compact('data_sakit', 'pasien', 'petugas', 'obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datasakit = new DataSakit;
        $datasakit->id_pasien = $request->id_pasien;
        $datasakit->berat_badan = $request->berat_badan;
        $datasakit->tinggi_badan = $request->tinggi_badan;
        $datasakit->keluhan = $request->keluhan;
        $datasakit->tensi = $request->tensi;
        $datasakit->suhu = $request->suhu;
        $datasakit->nadi = $request->nadi;
        $datasakit->golongan_darah = $request->golongan_darah;
        $datasakit->spo2 = $request->spo2;
        $datasakit->alergi = $request->alergi;
        $datasakit->perkiraan_penyakit = $request->perkiraan_penyakit;
        $datasakit->id_obat = $request->id_obat;
        $datasakit->status_pasien = $request->status_pasien;
        $datasakit->id_petugas = $request->id_petugas;

        $datasakit->save();
        return redirect('/data-sakit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_sakit = DataSakit::find($id);
        $pasien = Pasien::all();
        return view('data_sakit.detail', compact('data_sakit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->role == 'visitor') {
            abort(403);
        }
        $data_sakit = DataSakit::find($id);
        $pasien = Pasien::all();
        $petugas = Petugas::all();
        $obat = Obat::all();
        return view('data_sakit.edit', compact('data_sakit', 'pasien', 'petugas','obat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_sakit = DataSakit::find($id);
        $data_sakit->update([
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'keluhan' => $request->keluhan,
            'tensi' => $request->tensi,
            'suhu' => $request->suhu,
            'nadi' => $request->nadi,
            'golongan_darah' => $request->golongan_darah,
            'spo2' => $request->spo2,
            'alergi' => $request->alergi,
            'perkiraan_penyakit' => $request->perkiraan_penyakit,
            'id_obat' => $request->id_obat,
            'status_pasien' => $request->status_pasien,
        ]);
        return redirect('/data-sakit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_sakit = DataSakit::find($id);
        $data_sakit->delete();
        return back();
    }
}
