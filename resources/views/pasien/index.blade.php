@extends('layouts.template')

@section('tab')
Data Pasien
@endsection

@section('title')
Data Pasien
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
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasien as $row)
                            <tr class="text-center">
                                <td>{{$loop->iteration + ($pasien->perpage() * ($pasien->currentpage() -1)) }}</td>
                                <td>{{$row->nama_pasien}}</td>
                                <td>{{$row->jenis_kelamin}}</td>
                                <td>{{$row->kelas}}</td>
                                <td>{{$row->jabatan->nama_jabatan}}</td>
                                <td>
                                    <form action="{{route('pasien.destroy', $row->id)}}" onsubmit="return confirm('Hapus pasien {{$row->nama_pasien}} ?')" method="post">
                                    @csrf
                                    @method('delete')
                                        <a href="{{route('pasien.show', $row->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i> Detail</a>
                                        @if(Auth::user()->role == 'admin')
                                        <a href="{{route('pasien.edit', $row->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                        @elseif (Auth::user()->role == 'petugas')
                                        <a href="{{route('pasien.edit', $row->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                        @else
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$pasien->appends(Request::all())->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabelLogout">Tambah pasien</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('pasien.store')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="form-label">Nama Pasien</label>
                                            <input type="text" name="nama_pasien" value="{{old('nama_pasien')}}" required='required' class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir" value="{{old('tanggal_lahir')}}" required='required' class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" required="required" class="form-control">
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Kelas</label>
                                            <select name="kelas" required="required" class="form-control">
                                                <option value="">-- Pilih Kelas --</option>
                                                <option value="Non-Murid">Non Murid</option>
                                                <option value="SMP VII">SMP VII</option>
                                                <option value="SMP VIII">SMP VIII</option>
                                                <option value="SMP IX">SMP IX</option>
                                                <option value="SMK X">SMK X</option>
                                                <option value="SMK XI">SMK XI</option>
                                                <option value="SMK XII">SMK XII</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Jabatan</label>
                                            <select name="id_jabatan" required="required" class="form-control">
                                                <option value="">-- Pilih Status --</option>
                                                @foreach ($jabatan as $row)
                                                    <option value="{{$row->id}}">{{$row->nama_jabatan}}</option>
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
