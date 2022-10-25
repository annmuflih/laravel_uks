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
                    @if(Auth::user()->role == 'admin')
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success"><i
                            class="fa fa-plus"></i> Tambah</a>
                    @elseif (Auth::user()->role == 'petugas')
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success"><i
                            class="fa fa-plus"></i> Tambah</a>
                    @else
                    @endif
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama Pasien</th>
                                <th>Subject</th>
                                <th>Tensi</th>
                                <th>Suhu</th>
                                <th>Nadi</th>
                                <th>SPO2</th>
                                <th>Assesment</th>
                                <th>Planning</th>
                                <th>Terapi</th>
                                <th>Status Pasien</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_sakit as $row)
                            <tr class="text-center">
                                <td>{{$loop->iteration + ($data_sakit->perpage() * ($data_sakit->currentpage() -1)) }}
                                </td>
                                <td>{{$row->pasien->nama_pasien}}</td>
                                <td>{{$row->subject}}</td>
                                <td>{{$row->tensi}}</td>
                                <td>{{$row->suhu}}</td>
                                <td>{{$row->nadi}}</td>
                                <td>{{$row->SPO2}}</td>
                                <td>{{$row->assesment}}</td>
                                <td>{{$row->planning}}</td>
                                <td>{{$row->terapi}}</td>
                                <td class="">
                                    @if ($row->status_pasien == 'Rawat')
                                    <span class="badge bg-warning" style="color: white">Rawat</span>
                                    @elseif ($row->status_pasien == 'Rawat Jalan')
                                    <span class="badge bg-primary" style="color: white">Rawat Jalan</span>
                                    @elseif ($row->status_pasien == 'Dirujuk')
                                    <span class="badge bg-danger" style="color: white">Dirujuk</span>
                                    @else
                                    <span class="badge bg-success" style="color: white">Sembuh</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('data-sakit.destroy', $row->id)}}"
                                        onsubmit="return confirm('Hapus Data Sakit {{$row->pasien->nama_pasien}} ?')"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{route('data-sakit.show', $row->id)}}" class="btn btn-primary"><i
                                                class="fa fa-eye"></i></a>
                                        @if(Auth::user()->role == 'admin')
                                        <a href="{{route('data-sakit.edit', $row->id)}}" class="btn btn-warning"><i
                                                class="fa fa-edit"></i></a>
                                        <button type="submit" class="btn btn-danger"><i
                                                class="fa fa-trash"></i></button>
                                        @elseif (Auth::user()->role == 'petugas')
                                        <a href="{{route('data-sakit.edit', $row->id)}}" class="btn btn-warning"><i
                                                class="fa fa-edit"></i></a>
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
                    {{$data_sakit->appends(Request::all())->links('pagination::bootstrap-4')}}
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
                <form action="{{route('data-sakit.store')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="form-label">Nama Pasien</label>
                            <select name="id_pasien" required="required" class="js-states form-control"
                                style="width: 100%; margin: 6px 12px;">
                                <option value="">-- Pilih Nama Pasien --</option>
                                @foreach ($pasien as $row)
                                <option value="{{$row->id}}">{{$row->nama_pasien}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label class="form-label">Diagnosa (SOAP)</label>

                        <div class="form-group">
                            <label class="form-label">A. Subject</label>
                            <textarea name="subject" value="{{old('subject')}}" required='required' class="form-control"
                                rows="3"></textarea>
                        </div>

                        <label class="form-label">B. Object</label>

                        <div class="form-group">
                            <label class="form-label">Tensi</label>
                            <input name="tensi" value="{{old('tensi')}}" required='required' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Suhu</label>
                            <input name="suhu" value="{{old('suhu')}}" required='required' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nadi</label>
                            <input name="nadi" value="{{old('nadi')}}" required='required' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">SPO2</label>
                            <input name="SPO2" value="{{old('SPO2')}}" required='required' class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-label">C. Assesment</label>
                            <textarea name="assesment" value="{{old('assesment')}}" required='required'
                                class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">D. Planning</label>
                            <textarea name="planning" value="{{old('planning')}}" required='required'
                                class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Terapi</label>
                            <textarea name="terapi" value="{{old('terapi')}}" required='required'
                                class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Kategori Penyakit</label>
                                <div class="custom-control custom-checkbox">
                                    <input name="kategori_penyakit" value="Pencernaan" type="checkbox" class="custom-control-input" id="Pencernaan">
                                    <label class="custom-control-label" for="Pencernaan">Pencernaan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input name="kategori_penyakit" value="Pernapasan" type="checkbox" class="custom-control-input" id="Pernapasan">
                                    <label class="custom-control-label" for="Pernapasan">Pernapasan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input name="kategori_penyakit" value="Kulit" type="checkbox" class="custom-control-input" id="Kulit">
                                    <label class="custom-control-label" for="Kulit">Kulit</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input name="kategori_penyakit" value="THT" type="checkbox" class="custom-control-input" id="THT">
                                    <label class="custom-control-label" for="THT">THT</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input name="kategori_penyakit" value="Gigi & Mulut" type="checkbox" class="custom-control-input" id="Gigi & Mulut">
                                    <label class="custom-control-label" for="Gigi & Mulut">Gigi & Mulut</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input name="kategori_penyakit" value="Infeksi" type="checkbox" class="custom-control-input" id="Infeksi">
                                    <label class="custom-control-label" for="Infeksi">Infeksi</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input name="kategori_penyakit" value="Cedera & Luka" type="checkbox" class="custom-control-input" id="Cedera & Luka">
                                    <label class="custom-control-label" for="Cedera & Luka">Cedera & Luka</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input name="kategori_penyakit" value="Hipetermi" type="checkbox" class="custom-control-input" id="Hipetermi">
                                    <label class="custom-control-label" for="Hipetermi">Hipetermi</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input name="kategori_penyakit" value="Hipotermi" type="checkbox" class="custom-control-input" id="Hipotermi">
                                    <label class="custom-control-label" for="Hipotermi">Hipotermi</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input name="kategori_penyakit" value="Hipertensi" type="checkbox" class="custom-control-input" id="Hipertensi">
                                    <label class="custom-control-label" for="Hipertensi">Hipertensi</label>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Status Pasien</label>
                            <select name="status_pasien" required="required" class="form-control">
                                <option value="">-- Pilih Status --</option>
                                <option value="Rawat Jalan">Rawat Jalan</option>
                                <option value="Rawat">Rawat</option>
                                <option value="Dirujuk">Dirujuk</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Petugas</label>
                            <select name="id_petugas" required="required" class="form-control">
                                <option value="">-- Pilih Petugas --</option>
                                @foreach ($petugas as $row)
                                <option value="{{$row->id}}">{{$row->nama_petugas}}</option>
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
        </script>
    </div>
</div>
@endsection
