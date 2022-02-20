@extends('layouts.template')

@section('tab')
Detail Data Pasien
@endsection

@section('title')
Detail Data Pasien
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Data Pasien
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Nama Pasien</th>
                            <th>: {{$pasien->nama_pasien}}</th>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <th>: {{($pasien->tanggal_lahir)}}</th>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <th>: {{($pasien->jenis_kelamin)}}</th>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <th>: {{($pasien->kelas)}}</th>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <th>: {{($pasien->jabatan->nama_jabatan)}}</th>
                        </tr>
                        <tr>
                            <th>Dibuat</th>
                            <th>: {{($pasien->created_at->format('d M Y / H:m:s'))}}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
