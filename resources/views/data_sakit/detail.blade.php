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
                    Detail Riwayat Penyakit
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>ID Riwayat Penyakit</th>
                            <th>: {{$data_sakit->id}}</th>
                        </tr>
                        <tr>
                            <th>Nama Pasien</th>
                            <th>: {{$data_sakit->pasien->nama_pasien}}</th>
                        </tr>
                        <tr>
                            <th>Keluhan</th>
                            <th>: {{($data_sakit->keluhan)}}</th>
                        </tr>
                        <tr>
                            <th>Tindakan</th>
                            <th>: {{($data_sakit->tindakan)}}</th>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <th>: {{($data_sakit->status_pasien)}}</th>
                        </tr>
                        <tr>
                            <th>Nama Petugas</th>
                            <th>: {{($data_sakit->petugas->nama_petugas)}}</th>
                        </tr>
                        <tr>
                            <th>Dibuat</th>
                            <th>: {{($data_sakit->created_at->format('d/m/Y H:m:s'))}}</th>
                        </tr>
                        <tr>
                            <th>Diupdate</th>
                            <th>: {{($data_sakit->updated_at->format('d/m/Y H:m:s'))}}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
