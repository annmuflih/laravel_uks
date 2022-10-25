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

                        <label class="form-label">Diagnosa (SOAP)</label>

                        <div class="form-group">
                            <label class="form-label">A. Subject</label>
                            <textarea type="text" name="subject" value="{{$data_sakit->subject}}" required='required' class="form-control" rows="3">{{$data_sakit->subject}}</textarea>
                        </div>

                        <label class="form-label">B. Object</label>

                        <div class="form-group">
                            <label class="form-label">Tensi</label>
                            <input type="text" name="tensi" value="{{$data_sakit->tensi}}" required='required' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Suhu</label>
                            <input type="text" name="suhu" value="{{$data_sakit->suhu}}" required='required' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nadi</label>
                            <input type="text" name="nadi" value="{{$data_sakit->nadi}}" required='required' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">SPO2</label>
                            <input type="text" name="SPO2" value="{{$data_sakit->SPO2}}" required='required' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">C. Assesment</label>
                            <textarea type="text" name="subject" required='required' class="form-control" rows="3">{{$data_sakit->assesment}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">D. Planning</label>
                            <textarea type="text" name="subject" required='required' class="form-control" rows="3">{{$data_sakit->planning}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Terapi</label>
                            <input type="text" name="terapi" value="{{$data_sakit->terapi}}" required='required' class="form-control">
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
