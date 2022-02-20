@extends('layouts.template')

@section('tab')
Edit Riwayat Penyakit
@endsection

@section('title')
Edit Riwayat Penyakit
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Riwayat Penyakit
                </div>
                <div class="card-body">
                    <form action="{{route('data-sakit.update', $data_sakit->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label">Nama pasien</label>
                            <input readonly type="text" value="{{$data_sakit->pasien->nama_pasien}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Keluhan</label>
                            <input type="text" name="keluhan" value="{{$data_sakit->keluhan}}" required='required' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tindakan</label>
                            <input type="text" name="tindakan" value="{{$data_sakit->tindakan}}" required='required' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status Pasien</label>
                            <select name="status_pasien" required="required" class="form-control">
                                <option value="{{$data_sakit->status_pasien}}">{{$data_sakit->status_pasien}}</option>
                                <option value="Rawat">Rawat</option>
                                <option value="Rawat Jalan">Rawat Jalan</option>
                                <option value="Dirujuk">Dirujuk</option>
                                <option value="Sembuh">Sembuh</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Petugas</label>
                            <input readonly type="text" value="{{$data_sakit->petugas->nama_petugas}}" class="form-control">
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
