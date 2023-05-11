<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Petugas;
use App\Models\RekamMedis;
use App\Models\DataSakit;
use App\Models\KategoriPenyakit;
use App\Models\NamaKategoriPenyakit;
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
        $petugas = Petugas::all();
        $pasien = Pasien::all();
        $namaKategoriPenyakits = NamaKategoriPenyakit::all();
        return view('data_sakit.index', compact('data_sakit','pasien','petugas', 'namaKategoriPenyakits'));

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
        // $input = $request->all();
        // DataSakit::create($input);

        // DataSakit::create([
        //     'id_pasien' => $request->id_pasien,
        //     'subject' => $request->subject,
        //     'tensi' => $request->tensi,
        //     'suhu' => $request->suhu,
        //     'nadi' => $request->nadi,
        //     'SPO2' => $request->SPO2,
        //     'assesment' => $request->assesment,
        //     'planning' => $request->planning,
        //     'terapi' => $request->terapi,
        //     'kategori_penyakit' => json_encode($request->kategori_penyakit),
        //     'status_pasien' => $request->status_pasien,
        //     'id_petugas' => $request->id_petugas,
        // ]);

        $datasakit = new DataSakit;
        $datasakit->id_pasien = $request->id_pasien;
        $datasakit->subject = $request->subject;
        $datasakit->tensi = $request->tensi;
        $datasakit->suhu = $request->suhu;
        $datasakit->nadi = $request->nadi;
        $datasakit->SPO2 = $request->SPO2;
        $datasakit->assesment = $request->assesment;
        $datasakit->planning = $request->planning;
        $datasakit->terapi = $request->terapi;
        $datasakit->kategori_penyakit = json_encode($request->kategori_penyakit);
        $datasakit->status_pasien = $request->status_pasien;
        $datasakit->id_petugas = $request->id_petugas;
        return redirect('/data-sakit');

        dd($request->all());
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
        if(auth()->user()->role == 'visitor'){
            abort(403);
        }
        $data_sakit = DataSakit::find($id);
        $pasien = Pasien::all();
        $petugas = Petugas::all();
        return view('data_sakit.edit',compact('data_sakit','pasien','petugas'));
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
            'subject' => $request->subject,
            'tensi' => $request->tensi,
            'suhu' => $request->suhu,
            'nadi' => $request->nadi,
            'SPO2' => $request->SPO2,
            'assesment' => $request->assesment,
            'planning' => $request->planning,
            'terapi' => $request->terapi,
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
