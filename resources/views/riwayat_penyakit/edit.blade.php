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
                    <form action="{{route('riwayat-penyakit.update', $riwayat_penyakit->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label">Nama</label>
                            <input readonly type="text" value="{{$riwayat_penyakit->nama}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="text" name="tanggal_lahir" value="{{$riwayat_penyakit->tanggal_lahir}}" required='required' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jenis Kelamin</label>
                            <input type="text" name="jenis_kelamin" value="{{$riwayat_penyakit->jenis_kelamin}}" required='required' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tahun Ajaran</label>
                            <input type="text" name="tahun_ajaran" value="{{$riwayat_penyakit->tahun_ajaran}}" required='required' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jabatan</label>
                            <select name="id_jabatan" required="required" class="form-control">
                                <option value="{{$riwayat_penyakit->id_jabatan}}">{{$riwayat_penyakit->jabatan->nama_jabatan}}</option>
                                @foreach ($jabatan as $row)
                                    <option value="{{$row->id}}">{{$row->nama_jabatan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Riwayat Penyakit</label>
                            <input type="text" name="riwayat_penyakit" value="{{$riwayat_penyakit->riwayat_penyakit}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Ketegori Penyakit</label>
                            <input type="text" name="kategori_penyakit" value="{{$riwayat_penyakit->kategori_penyakit}}" class="form-control">
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
