<?php

namespace App\Http\Controllers;

use App\Imports\RiwayatPenyakitImport;
use App\Models\Jabatan;
use App\Models\Pasien;
use App\Models\RiwayatPenyakit;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RiwayatPenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayat_penyakit = RiwayatPenyakit::orderBy('created_at', 'desc')->paginate(10);
        $pasien = Pasien::all();
        return view('riwayat_penyakit.index', compact('riwayat_penyakit', 'pasien'));
    }

    public function riwayatPenyakitImport(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new RiwayatPenyakitImport, $file);
        return back();
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
        $request->validate([
            'riwayat_penyakit' => 'required|string|max:255',
            'id_pasien' => 'required|exists:pasien,id',
        ]);

        // Simpan ke database
        RiwayatPenyakit::create([
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'id_pasien' => $request->id_pasien,
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
        $riwayat_penyakit = RiwayatPenyakit::with('pasien')->findOrFail($id);
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
        $riwayat_penyakit = RiwayatPenyakit::findOrFail($id);
        $pasien = Pasien::all();
        return view('riwayat_penyakit.edit', compact('riwayat_penyakit', 'pasien'));
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
        $request->validate([
            'riwayat_penyakit' => 'required|string|max:255',
            'id_pasien' => 'required|exists:pasien,id',
        ]);

        $riwayat_penyakit = RiwayatPenyakit::findOrFail($id);
        $riwayat_penyakit->update([
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'id_pasien' => $request->id_pasien,
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
        $riwayat_penyakit = RiwayatPenyakit::findOrFail($id);
        $riwayat_penyakit->delete();
        return back();
    }
}
