@extends('layouts.template')

@section('tab')
Edit Data Pasien
@endsection

@section('title')
Edit Data Pasien
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Data Pasien
                </div>
                <div class="card-body">
                    <form action="{{route('pasien.update', $pasien->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Nama pasien</label>
                                <input type="text" name="nama_pasien" value="{{$pasien->nama_pasien}}" required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="fungsi_pasien" value="{{$pasien->tanggal_lahir}}" required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" required="required" class="form-control">
                                    <option value="{{$pasien->jenis_kelamin}}">{{$pasien->jenis_kelamin}}</option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Kelas</label>
                                <select name="kelas" required="required" class="form-control">
                                    <option value="{{$pasien->kelas}}">{{$pasien->kelas}}</option>
                                    <option value="Non-Murid">Non Murid</option>
                                    <option value="smp_vii">SMP VII</option>
                                    <option value="smp_viii">SMP VIII</option>
                                    <option value="smp_ix">SMP IX</option>
                                    <option value="smk_x">SMK X</option>
                                    <option value="smk_xi">SMK XI</option>
                                    <option value="smk_xii">SMK XII</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jabatan</label>
                                <select name="id_jabatan" required="required" class="form-control">
                                    <option value="{{$pasien->id_jabatan}}">{{$pasien->id_jabatan}}</option>
                                    @foreach ($jabatan as $row)
                                        <option value="{{$row->id}}">{{$row->nama_jabatan}}</option>
                                    @endforeach
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
