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
                            <th>: {{$riwayat_penyakit->id}}</th>
                        </tr>
                        <tr>
                            <th>Nama Pasien</th>
                            <th>: {{$riwayat_penyakit->nama}}</th>
                        </tr>
                        <tr>
                            <th>Keluhan</th>
                            <th>: {{($riwayat_penyakit->tanggal_lahir)}}</th>
                        </tr>
                        <tr>
                            <th>Tindakan</th>
                            <th>: {{($riwayat_penyakit->jenis_kelamin)}}</th>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <th>: {{($riwayat_penyakit->tahun_ajaran)}}</th>
                        </tr>
                        <tr>
                            <th>Nama Petugas</th>
                            <th>: {{($riwayat_penyakit->jabatan->nama_jabatan)}}</th>
                        </tr>
                        <tr>
                            <th>Riwayat Penyakit</th>
                            <th>: {{($riwayat_penyakit->riwayat_penyakit)}}</th>
                        </tr>
                        <tr>
                            <th>Ketegori Penyakit</th>
                            <th>: {{($riwayat_penyakit->kategori_penyakit)}}</th>
                        </tr>
                        <tr>
                            <th>Dibuat</th>
                            <th>: {{($riwayat_penyakit->created_at->format('d/m/Y H:m:s'))}}</th>
                        </tr>
                        <tr>
                            <th>Diupdate</th>
                            <th>: {{($riwayat_penyakit->updated_at->format('d/m/Y H:m:s'))}}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
