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
                            Detail Rekam Medis Pasien <b style="color: black">{{ $data_sakit->pasien->nama_pasien }}</b>
                        @endempty
                        <a href="{{ route('rekam-medis.print', $idpasien) }}" class="btn btn-success float-right"><i
                                class="fa-solid fa-print"></i> Cetak</a>

                    </div>
                    <div class="card-body">
                        @empty($detail)
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID Riwayat Sakit</th>
                                        <th>Keluhan</th>
                                        <th>Obat</th>
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
                                        <th>Perkiraan Penyakit</th>
                                        <th>Obat</th>
                                        <th>Status Pasien</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail as $row)
                                        <tr class="text-center">
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->keluhan }}</td>
                                            <td>{{ $data_sakit->perkiraan_penyakit }}</td>
                                            <td>{{ $data_sakit->obat->nama_obat ?? '-' }}</td>
                                            <td>
                                                @if ($row->status_pasien == 'Belum Rawat')
                                                    <span class="badge bg-danger" style="color: white">Belum Rawat</span>
                                                @elseif ($row->status_pasien == 'Rawat Jalan')
                                                    <span class="badge bg-primary" style="color: white">Rawat Jalan</span>
                                                @elseif ($row->status_pasien == 'Rawat Inap')
                                                    <span class="badge bg-primary" style="color: white">Rawat Inap</span>
                                                @elseif ($row->status_pasien == 'Dirujuk')
                                                    <span class="badge bg-danger" style="color: white">Dirujuk</span>
                                                @elseif ($row->status_pasien == 'Batal Rawat')
                                                    <span class="badge bg-danger" style="color: white">Batal Rawat</span>
                                                @else
                                                    <span class="badge bg-success" style="color: white">Sembuh</span>
                                                @endif
                                            </td>
                                            <td>{{ $row->created_at->format('d/m/Y') }}</td>
                                            <td>{{ $row->created_at->format('H:m:s') }}</td>
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
