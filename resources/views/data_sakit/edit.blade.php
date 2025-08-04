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
                        <form action="{{ route('data-sakit.update', $data_sakit->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="form-label">Nama pasien</label>
                                    <input readonly type="text" value="{{ $data_sakit->pasien->nama_pasien }}"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Berat Badan</label>
                                    <textarea name="berat_badan" class="form-control" required>{{ $data_sakit->berat_badan }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Tinggi Badan</label>
                                    <textarea name="tinggi_badan" class="form-control" required>{{ $data_sakit->tinggi_badan }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Keluhan</label>
                                    <textarea name="keluhan" class="form-control" required>{{ $data_sakit->keluhan }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Tensi</label>
                                    <input name="tensi" class="form-control" value="{{ $data_sakit->tensi }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Suhu</label>
                                    <input name="suhu" class="form-control" value="{{ $data_sakit->suhu }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Nadi</label>
                                    <input name="nadi" class="form-control" value="{{ $data_sakit->nadi }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Golongan Darah</label>
                                    <input name="golongan_darah" class="form-control"
                                        value="{{ $data_sakit->golongan_darah }}">
                                </div>

                                <div class="form-group">
                                    <label>SPO2</label>
                                    <input name="spo2" class="form-control" value="{{ $data_sakit->spo2 }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Alergi</label>
                                    <input name="alergi" class="form-control" value="{{ $data_sakit->alergi }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Perkiraan Penyakit</label>
                                    <input name="perkiraan_penyakit" class="form-control"
                                        value="{{ $data_sakit->perkiraan_penyakit }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Obat</label>
                                    <select name="id_obat" class="form-control" required>
                                        <option value="">-- Pilih Obat --</option>
                                        @foreach ($obat as $owbat)
                                            <option value="{{ $owbat->id }}"
                                                {{ $data_sakit->id_obat == $owbat->id ? 'selected' : '' }}>
                                                {{ $owbat->nama_obat }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Status Pasien</label>
                                    <select name="status_pasien" class="form-control" required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Belum Rawat"
                                            {{ $data_sakit->status_pasien == 'Belum Rawat' ? 'selected' : '' }}>Belum Rawat
                                        </option>
                                        <option value="Rawat Jalan"
                                            {{ $data_sakit->status_pasien == 'Rawat Jalan' ? 'selected' : '' }}>Rawat Jalan
                                        </option>
                                        <option value="Rawat Inap"
                                            {{ $data_sakit->status_pasien == 'Rawat Inap' ? 'selected' : '' }}>Rawat Inap
                                        </option>
                                        <option value="Dirujuk"
                                            {{ $data_sakit->status_pasien == 'Dirujuk' ? 'selected' : '' }}>Dirujuk
                                        </option>
                                        <option value="Sembuh"
                                            {{ $data_sakit->status_pasien == 'Sembuh' ? 'selected' : '' }}>Sembuh
                                        </option>
                                        <option value="Batal Rawat"
                                            {{ $data_sakit->status_pasien == 'Batal Rawat' ? 'selected' : '' }}>Batal Rawat
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Dokter</label>
                                    <input readonly type="text" value="{{ $data_sakit->petugas->nama_petugas }}"
                                        class="form-control">
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
