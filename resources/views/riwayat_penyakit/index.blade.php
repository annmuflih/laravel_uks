@extends('layouts.template')

@section('tab')
    Riwayat Penyakit
@endsection

@section('title')
    Riwayat Penyakit
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @if (Auth::user()->role == 'admin')
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal"
                                class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#importModal"
                                class="btn btn-primary"><i class="fas fa-file-upload"></i> Import</a>
                        @elseif (Auth::user()->role == 'petugas')
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal"
                                class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
                        @else
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Jabatan</th>
                                    <th>Riwayat Penyakit</th>
                                    <th>Kategori Penyakit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayat_penyakit as $row)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration + $riwayat_penyakit->perpage() * ($riwayat_penyakit->currentpage() - 1) }}
                                        </td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->tahun_ajaran }}</td>
                                        <td>{{ $row->jabatan->nama_jabatan }}</td>
                                        <td>{{ $row->riwayat_penyakit }}</td>
                                        <td>
                                            @if ($row->kategori_penyakit == 'Ringan')
                                                <span class="badge bg-success" style="color: white"> Ringan </span>
                                            @elseif ($row->kategori_penyakit == 'Sedang')
                                                <span class="badge bg-warning" style="color: white"> Sedang </span>
                                            @else
                                                <span class="badge bg-danger" style="color: white"> Berat </span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('riwayat-penyakit.destroy', $row->id) }}"
                                                onsubmit="return confirm('Hapus riwayat penyakit {{ $row->nama_riwayat_penyakit }} ?')"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('riwayat-penyakit.show', $row->id) }}" class="btn btn-primary"><i
                                                        class="fa fa-eye"></i></a>
                                                @if (Auth::user()->role == 'admin')
                                                    <a href="{{ route('riwayat-penyakit.edit', $row->id) }}"
                                                        class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                @elseif (Auth::user()->role == 'petugas')
                                                    <a href="{{ route('riwayat-penyakit.edit', $row->id) }}"
                                                        class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                @else
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $riwayat_penyakit->appends(Request::all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
        {{-- modal tambah --}}
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Tambah riwayat_penyakit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('riwayat-penyakit.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" value="{{ old('nama') }}"
                                    required='required' class="form-control @error('nama') is-invalid @enderror">
                                @error('nama_riwayat_penyakit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                    required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" required="required" class="form-control">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tahun Ajaran</label>
                                <input type="text" name="tahun_ajaran" value="{{ old('tahun_ajaran') }}" placeholder="ex.2020/2021"
                                    required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jabatan</label>
                                <select name="id_jabatan" required="required" class="form-control">
                                    <option value="">-- Pilih Jabatan --</option>
                                    @foreach ($jabatan as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Riwayat Penyakit</label>
                                <textarea type="text" name="riwayat_penyakit" value="{{ old('riwayat_penyakit') }}" rows="2"
                                    required='required' class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Kategori Penyakit</label>
                                <select name="kategori_penyakit" required="required" class="form-control">
                                    <option value="">-- Pilih Kategori Penyakit --</option>
                                    <option value="Ringan">Ringan</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Berat">Berat</option>
                                </select>
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
        {{-- modal import --}}
        <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Tambah Riwayat Penyakit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="{{ route('riwayatPenyakitImport') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" required>
                                <input type="submit" class="btn btn-primary" value="Upload Excel" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
