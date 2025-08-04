@extends('layouts.template')

@section('tab')
    Data Sakit
@endsection

@section('title')
    Data Sakit
@endsection

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @if (Auth::user()->role == 'admin')
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success"><i
                                    class="fa fa-plus"></i> Tambah</a>
                        @elseif (Auth::user()->role == 'petugas')
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal"
                                class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
                        @else
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Nama Pasien</th>
                                    <th>Keluhan</th>
                                    <th>Perkiraan Penyakit</th>
                                    <th>Obat</th>
                                    <th>Status Pasien</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_sakit as $row)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration + $data_sakit->perpage() * ($data_sakit->currentpage() - 1) }}
                                        </td>
                                        <td>{{ $row->pasien->nama_pasien }}</td>
                                        <td>{{ $row->keluhan }}</td>
                                        <td>{{ $row->perkiraan_penyakit }}</td>
                                        <td>{{ $row->obat->nama_obat }}</td>
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
                                        <td>
                                            <form action="{{ route('data-sakit.destroy', $row->id) }}"
                                                onsubmit="return confirm('Hapus Data Sakit {{ $row->pasien->nama_pasien }} ?')"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('data-sakit.show', $row->id) }}"
                                                    class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                @if (Auth::user()->role == 'admin')
                                                    <a href="{{ route('data-sakit.edit', $row->id) }}"
                                                        class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                @elseif (Auth::user()->role == 'petugas')
                                                    <a href="{{ route('data-sakit.edit', $row->id) }}"
                                                        class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                @else
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data_sakit->appends(Request::all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addModal" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Tambah Rekam Medis</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('data-sakit.store') }}" method="post">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="form-label">Nama Pasien</label>
                                <select name="id_pasien" required="required" class="js-states form-control"
                                    style="width: 100%; margin: 6px 12px;">
                                    <option value="">-- Pilih Nama Pasien --</option>
                                    @foreach ($pasien as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_pasien }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Berat Badan</label>
                                <input name="berat_badan" required='required' class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tinggi Badan</label>
                                <input name="tinggi_badan" required='required' class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Keluhan</label>
                                <input name="keluhan" required='required' class="form-control"></input>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Tensi</label>
                                <input name="tensi" required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Suhu</label>
                                <input name="suhu" required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nadi</label>
                                <input name="nadi" required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Golongan Darah</label>
                                <input name="golongan_darah" required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">SPO2</label>
                                <input name="spo2" required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Alergi</label>
                                <input name="alergi" required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Perkiraan Penyakit</label>
                                <input name="perkiraan_penyakit" required='required' class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Obat</label>
                                <select name="id_obat" required="required" class="js-states form-control"
                                    style="width: 100%; margin: 6px 12px;">
                                    <option value="">-- Pilih Obat --</option>
                                    @foreach ($obat as $owbat)
                                        <option value="{{ $owbat->id }}">{{ $owbat->nama_obat }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Status Pasien</label>
                                <select name="status_pasien" required="required" class="form-control">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Belum Rawat">Belum Rawat</option>
                                    <option value="Rawat Jalan">Rawat Jalan</option>
                                    <option value="Rawat Inap">Rawat Inap</option>
                                    <option value="Dirujuk">Dirujuk</option>
                                    <option value="Batal Rawat">Batal Rawat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Dokter</label>
                                <select name="id_petugas" required="required" class="form-control">
                                    <option value="">-- Pilih Dokter --</option>
                                    @foreach ($petugas as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_petugas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-primary">Tambah</button>
                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.js-states').select2();
                });
                $("#id_pasien").select2({
                    placeholder: "Select a programming language",
                    allowClear: true
                });
                $("#id_obat").select2({
                    placeholder: "Select a programming language",
                    allowClear: true
                });
            </script>
        </div>
    </div>
@endsection
