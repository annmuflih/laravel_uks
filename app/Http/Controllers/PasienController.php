<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pasien = Pasien::orderBy('created_at', 'desc')->paginate(10);
        $jabatan = Jabatan::all();
        // return dd($pasien, $jabatan);
        return view('pasien.index', compact('pasien', 'jabatan'));
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
        $pasien = Pasien::create([
            'nama_pasien' => $request->nama_pasien,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas' => $request->kelas,
            'id_jabatan' => $request->id_jabatan,
        ]);
        RekamMedis::create([
            'id_pasien' => $pasien->id,
            'id_riwayat-penyakit' => 0,
        ]);
        return redirect('/pasien');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = Pasien::find($id);
        return view('pasien.detail', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->role == 'visitor'){
            abort(403);
        }
        $pasien = Pasien::find($id);
        $jabatan = Jabatan::all();
        return view('pasien.edit', compact('pasien', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pasien = Pasien::find($id);

        $input = $request->all();
        $input['tanggal_lahir'] = date('Y-m-d');
        $pasien->update($input);
        return redirect('/pasien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete();
        return back();
    }
}
