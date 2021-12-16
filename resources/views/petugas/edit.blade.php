@extends('layouts.template')

@section('tab')
Edit Petugas UKS
@endsection

@section('title')
Edit Petugas UKS
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Petugas
                </div>
                <div class="card-body">
                    <form action="{{route('petugas.update', $petugas->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Nama Petugas</label>
                                <input type="text" name="nama_petugas" value="{{$petugas->nama_petugas}}" required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nomor Induk Petugas</label>
                                <input name="nomor_induk_petugas" required='required' class="form-control" value="{{$petugas->nomor_induk_petugas}}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
