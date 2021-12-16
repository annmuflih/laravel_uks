@extends('layouts.template')

@section('tab')
Edit Jabatan
@endsection

@section('title')
Edit Jabatan
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Jabatan
                </div>
                <div class="card-body">
                    <form action="{{route('jabatan.update', $jabatan->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Nama Jabatan</label>
                                <input type="text" name="nama_jabatan" value="{{$jabatan->nama_jabatan}}" required='required' class="form-control">
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
