<?php

namespace App\Http\Controllers;

use App\Models\MedicalCheckUp;
use App\Models\Pasien;
use Faker\Provider\Medical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MedicalCheckUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mcu = MedicalCheckUp::orderBy('created_at', 'desc')->paginate(10);
        $pasien = Pasien::all();
        return view('medical-check-up.index', compact('mcu', 'pasien'));
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
            'pasien_id' => 'required|exists:pasien,id',
            'mcu' => 'required|file|mimes:pdf,jpg,jpeg,png',
        ]);

        $file = $request->file('mcu');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/mcu'), $filename);

        MedicalCheckUp::create([
            'pasien_id' => $request->pasien_id,
            'nama' => Pasien::find($request->pasien_id)->nama, // Simpan juga nama (opsional)
            'status' => 'Belum Terverifikasi',
            'file' => $filename,
        ]);
        return redirect('/medical-check-up');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mcu = MedicalCheckUp::find($id);
        return view('medical-check-up.detail', compact('mcu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mcu = MedicalCheckUp::find($id);
        return view('medical-check-up.edit', compact('mcu'));
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
        $mcu = MedicalCheckUp::find($id);

        $input = $request->all();
        $mcu->update($input);
        return redirect('/medical-check-up');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
