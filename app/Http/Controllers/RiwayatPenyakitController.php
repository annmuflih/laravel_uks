<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Petugas;
use App\Models\RekamMedis;
use App\Models\RiwayatPenyakit;
use Illuminate\Http\Request;

class RiwayatPenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayat_penyakit = RiwayatPenyakit::orderBy('updated_at', 'desc')->paginate(10);
        $petugas = Petugas::all();
        $pasien = Pasien::all();
        return view('riwayat_penyakit.index', compact('riwayat_penyakit','pasien','petugas'));
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
        $input = $request->all();
        $riwayat_penyakit = RiwayatPenyakit::create($input);
        $rekam_medis = RekamMedis::where('id_pasien', $request->id_pasien)->first();
        $rekam_medis -> create([
            'id_pasien' => $request->id_pasien,
            'id_riwayat-penyakit' => $riwayat_penyakit->id,
        ]);
        return redirect('/riwayat-penyakit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $riwayat_penyakit = RiwayatPenyakit::find($id);
        $pasien = Pasien::all();
        return view('riwayat_penyakit.detail', compact('riwayat_penyakit'));
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
        $riwayat_penyakit = RiwayatPenyakit::find($id);
        $pasien = Pasien::all();
        $petugas = Petugas::all();
        return view('riwayat_penyakit.edit',compact('riwayat_penyakit','pasien','petugas'));
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
        $riwayat_penyakit = RiwayatPenyakit::find($id);
        $riwayat_penyakit->update([
            'keluhan' => $request->keluhan,
            'tindakan' => $request->tindakan,
            'status_pasien' => $request->status_pasien,
        ]);
        return redirect('/riwayat-penyakit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riwayat_penyakit = RiwayatPenyakit::find($id);
        $riwayat_penyakit->delete();
        return back();
    }
}
