@extends('layouts.template')

@section('tab')
Edit Info
@endsection

@section('title')
Edit Info
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Info
                </div>
                <div class="card-body">
                    <form action="{{route('info.update', $info->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Judul info</label>
                                <input type="text" name="judul_info" value="{{$info->judul_info}}" required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Isi info</label>
                                <textarea name="isi_info" required='required' class="form-control" rows="5">{{$info->isi_info}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Penerbit</label>
                                <input type="text" name="penerbit" value="{{$info->penerbit}}" required='required' class="form-control">
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
