<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\RekamMedis;
use App\Models\RiwayatPenyakit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //count
        $obatcount = Obat::all()->count();
        $pasiencount = Pasien::all()->count();
        $rawatcount = RiwayatPenyakit::where('status_pasien', 'Rawat')->count();
        $rawatjalancount = RiwayatPenyakit::where('status_pasien', 'Rawat Jalan')->count();

        //table
        $obat = Obat::all()->take(5);
        $riwayat_penyakit = RiwayatPenyakit::orderBy('created_at','desc')->get()->take(5);
        $info = Info::all();
        // $pasien = Pasien::all();

        //nomor
        $i = 1;
        $a = 1;

        //chart
 //       $pasiens = Pasien::select(DB::raw("COUNT(*) as count"))
 //               ->whereYear('created_at', date('Y'))
 //               //"DATE_FORMAT(created_at, '%m-%Y')"
 //               ->groupBy(DB::raw("month(created_at)"))
 //              ->pluck('count');


                  $pasiens = Pasien::select(DB::raw("COUNT(*) as count"))
                            ->whereYear('created_at', date('Y'))
                            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m')"))
                            ->pluck('count');


        $months = Pasien::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("month(created_at)"))
                ->pluck('month');

        $datas = [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach ($months as $index => $month)
        {
            $datas[$month - 1] = $pasiens[$index];
        }

        // return dd($datas);

        return view('home', compact(
            'obatcount',
            'pasiencount',
            'rawatcount',
            'rawatjalancount',
            'obat',
            'riwayat_penyakit',
            'info',
            'datas',
            'i',
            'a',
            'pasiens'
        ));
    }
}
