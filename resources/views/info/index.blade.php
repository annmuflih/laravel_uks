@extends('layouts.template')

@section('tab')
Info UKS
@endsection

@section('title')
Info UKS
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
                                <th>Info</th>
                                <th>Penerbit</th>
                                <th>Tanggal Terbit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($info as $row)
                            <tr class="text-center">
                                <td>{{ $loop->iteration + ($info->perpage() * ($info->currentpage() -1)) }}</td>
                                <td>{{$row->judul_info}}</td>
                                <td>{{$row->penerbit}}</td>
                                <td>{{$row->tanggal_terbit}}</td>
                                <td>
                                    <form action="{{route('info.destroy', $row->id)}}" onsubmit="return confirm('Hapus info {{$row->judul_info}} ?')" method="post">
                                    @csrf
                                    @method('delete')
                                        <a href="{{route('info.show', $row->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i> Detail</a>
                                        @if(Auth::user()->role == 'admin')
                                        <a href="{{route('info.edit', $row->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                        @elseif (Auth::user()->role == 'petugas')
                                        <a href="{{route('info.edit', $row->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                        @else
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$info->appends(Request::all())->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabelLogout">Tambah Info</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('info.store')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="form-label">Judul Info</label>
                                            <input type="text" name="judul_info" value="{{old('judul_info')}}" required='required' class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Isi Info</label>
                                            <textarea name="isi_info" required='required' class="form-control" rows="5">{{old('isi_info')}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Penerbit</label>
                                            <input type="text" name="penerbit" value="{{old('penerbit')}}" required='required' class="form-control">
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
