@extends('layouts.template')

@section('tab')
Data Sakit
@endsection

@section('title')
Data Sakit
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if(Auth::user()->role == 'admin')
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
                    @elseif (Auth::user()->role == 'petugas')
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
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
                                <th>Tindakan</th>
                                <th>Status Pasien</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_sakit as $row)
                            <tr class="text-center">
                                <td>{{$loop->iteration + ($data_sakit->perpage() * ($data_sakit->currentpage() -1)) }}</td>
                                <td>{{$row->pasien->nama_pasien}}</td>
                                <td>{{$row->keluhan}}</td>
                                <td>{{$row->tindakan}}</td>
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
                                    <form action="{{route('data-sakit.destroy', $row->id)}}" onsubmit="return confirm('Hapus Data Sakit {{$row->pasien->nama_pasien}} ?')" method="post">
                                    @csrf
                                    @method('delete')
                                        <a href="{{route('data-sakit.show', $row->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                        @if(Auth::user()->role == 'admin')
                                        <a href="{{route('data-sakit.edit', $row->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        @elseif (Auth::user()->role == 'petugas')
                                        <a href="{{route('data-sakit.edit', $row->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
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
                                            <select name="id_pasien" required="required" class="form-control">
                                                <option value="">-- Pilih Pasien --</option>
                                                @foreach ($pasien as $row)
                                                    <option value="{{$row->id}}">{{$row->nama_pasien}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Keluhan</label>
                                            <textarea name="keluhan" value="{{old('keluhan')}}" required='required' class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Tindakan</label>
                                            <textarea name="tindakan" value="{{old('tindakan')}}" required='required' class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Kategori Penyakit</label>
                                            <select name="kategori_penyakit" required="required" class="form-control">
                                                <option value="">-- Pilih Kategori --</option>
                                                <option value="Pencernaan">Pencernaan</option>
                                                <option value="Pernafasan">Pernafasan</option>
                                                <option value="Kulit">Kulit</option>
                                                <option value="THT">THT</option>
                                                <option value="Gigi & Mulut">Gigi & Mulut</option>
                                                <option value="Infeksi">Infeksi</option>
                                                <option value="Cedera & Luka">Cedera & Luka</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
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
                    </div>
</div>
@endsection
