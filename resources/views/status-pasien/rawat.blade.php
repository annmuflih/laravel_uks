@extends('layouts.template')

@section('tab')
Rawat
@endsection

@section('title')
Rawat
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Pasien Dirawat
                    {{-- <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a> --}}
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama Pasien</th>
                                <th>Keluhan</th>
                                <th>Tindakan</th>
                                <th>Status Pasien</th>
                                <th>Diupdate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayat_penyakit as $row)
                            <tr class="text-center">
                                <td>{{$loop->iteration + ($riwayat_penyakit->perpage() * ($riwayat_penyakit->currentpage() -1)) }}</td>
                                <td>{{$row->pasien->nama_pasien}}</td>
                                <td>{{$row->keluhan}}</td>
                                <td>{{$row->tindakan}}</td>
                                <td>
                                    <span class="badge bg-warning" style="color: white">{{$row->status_pasien}}</span>
                                </td>
                                <td>{{$row->updated_at->format('d-m-y H:m:s')}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$riwayat_penyakit->appends(Request::all())->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
