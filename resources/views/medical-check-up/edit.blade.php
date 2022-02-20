@extends('layouts.template')

@section('tab')
Edit Medical Check Up
@endsection

@section('title')
Edit Medical Check Up
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Medical Check Up
                </div>
                <div class="card-body">
                    <form action="{{route('medical-check-up.update', $mcu->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" value="{{$mcu->nama}}" required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jabatan</label>
                                <select name="id_jabatan" required="required" class="form-control">
                                    <option value="{{$mcu->id_jabatan}}">{{$mcu->jabatan->nama_jabatan}}</option>
                                    @foreach ($jabatan as $row)
                                        <option value="{{$row->id}}">{{$row->nama_jabatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select name="status" required="required" class="form-control">
                                    <option value="{{$mcu->status}}">{{$mcu->status}}</option>
                                    <option value="Terverifikasi">Terverifikasi</option>
                                    <option value="Belum Terverifikasi">Belum Terverifikasi</option>
                                </select>
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
