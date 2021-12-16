@extends('layouts.template')

@section('tab')
Detail Riwayat Penyakit
@endsection

@section('title')
Detail Riwayat Penyakit
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @empty($riwayat_penyakit)
                        Detail Riwayat Penyakit Pasien <b style="color: black"></b>
                    @else
                        Detail Riwayat Penyakit Pasien <b style="color: black">{{$riwayat_penyakit->pasien->nama_pasien}}</b>
                    @endempty

                </div>
                <div class="card-body">
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
