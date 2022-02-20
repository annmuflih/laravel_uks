@extends('layouts.template')

@section('tab')
Detail Rekam Medis
@endsection

@section('title')
Detail Rekam Medis
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @empty($data_sakit)
                        Detail Rekam Medis Pasien <b style="color: black"></b>
                    @else
                        Detail Rekam Medis Pasien <b style="color: black">{{$data_sakit->pasien->nama_pasien}}</b>
                    @endempty
                </div>
                <div class="card-body">
                    @empty($detail)
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>ID Riwayat Sakit</th>
                                    <th>Keluhan</th>
                                    <th>Tindakan</th>
                                    <th>Status Pasien</th>
                                    <th>Nama Petugas</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="text-center mt-3">
                            <span>Rekam Medis Belum Tersedia</span>
                        </div>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>ID Riwayat Sakit</th>
                                    <th>Keluhan</th>
                                    <th>Tindakan</th>
                                    <th>Status Pasien</th>
                                    <th>Nama Petugas</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail as $row)
                                <tr class="text-center">
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->keluhan}}</td>
                                    <td>{{$row->tindakan}}</td>
                                    <td>
                                        @if ($row->status_pasien == 'Rawat')
                                            <span class="badge bg-warning" style="color: white">Rawat</span>
                                        @else
                                            <span class="badge bg-primary" style="color: white">Rawat Jalan</span>
                                        @endif
                                    </td>
                                    <td>{{$row->petugas->nama_petugas}}</td>
                                    <td>{{$row->created_at->format('d/m/Y')}}</td>
                                    <td>{{$row->created_at->format('H:m:s')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endempty
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
