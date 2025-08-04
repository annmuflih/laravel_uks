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
                                <th>: {{ $data_sakit->id }}</th>
                            </tr>
                            <tr>
                                <th>Nama Pasien</th>
                                <th>: {{ $data_sakit->pasien->nama_pasien }}</th>
                            </tr>
                            <tr>
                                <th>Berat Badan</th>
                                <td>: {{ $data_sakit->berat_badan }} kg</td>
                            </tr>
                            <tr>
                                <th>Tinggi Badan</th>
                                <td>: {{ $data_sakit->tinggi_badan }} cm</td>
                            </tr>
                            <tr>
                                <th>Keluhan</th>
                                <td>: {{ $data_sakit->keluhan }}</td>
                            </tr>
                            <tr>
                                <th>Tensi</th>
                                <td>: {{ $data_sakit->tensi }}</td>
                            </tr>
                            <tr>
                                <th>Suhu</th>
                                <td>: {{ $data_sakit->suhu }} °C</td>
                            </tr>
                            <tr>
                                <th>Nadi</th>
                                <td>: {{ $data_sakit->nadi }} bpm</td>
                            </tr>
                            <tr>
                                <th>SPO2</th>
                                <td>: {{ $data_sakit->spo2 }} %</td>
                            </tr>
                            <tr>
                                <th>Alergi</th>
                                <td>: {{ $data_sakit->alergi }}</td>
                            </tr>
                            <tr>
                                <th>Perkiraan Penyakit</th>
                                <td>: {{ $data_sakit->perkiraan_penyakit }}</td>
                            </tr>
                            <tr>
                                <th>Golongan Darah</th>
                                <td>: {{ $data_sakit->golongan_darah ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Obat</th>
                                <td>: {{ $data_sakit->obat->nama_obat ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Status Pasien</th>
                                <td>: {{ $data_sakit->status_pasien }}</td>
                            </tr>
                            <tr>
                                <th>Dokter</th>
                                <td>: {{ $data_sakit->petugas->nama_petugas ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat</th>
                                <th>: {{ $data_sakit->created_at->format('d/m/Y H:m:s') }}</th>
                            </tr>
                            <tr>
                                <th>Diupdate</th>
                                <th>: {{ $data_sakit->updated_at->format('d/m/Y H:m:s') }}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
