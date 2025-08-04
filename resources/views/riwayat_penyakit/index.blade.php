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
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success"><i
                                    class="fa fa-plus"></i> Tambah</a>
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
                                    <th>Jenis Kelamin</th>
                                    <th>Usia</th>
                                    <th>Riwayat Penyakit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayat_penyakit as $row)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration + $riwayat_penyakit->perPage() * ($riwayat_penyakit->currentPage() - 1) }}
                                        </td>
                                        <td>{{ $row->pasien->nama_pasien }}</td>
                                        <td>{{ $row->pasien->jenis_kelamin }}</td>
                                        <td>{{ $row->pasien->usia }} tahun</td>
                                        <td>{{ $row->riwayat_penyakit }}</td>
                                        <td>
                                            <form action="{{ route('riwayat-penyakit.destroy', $row->id) }}" method="POST"
                                                onsubmit="return confirm('Hapus riwayat {{ $row->riwayat_penyakit }}?')">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('riwayat-penyakit.show', $row->id) }}"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('riwayat-penyakit.edit', $row->id) }}"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-trash"></i></button>
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
                        <h5 class="modal-title" id="exampleModalLabelLogout">Tambah Riwayat Penyakit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span>&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('riwayat-penyakit.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            {{-- Nama Pasien --}}
                            <div class="form-group">
                                <label for="id_pasien">Nama Pasien</label>
                                <select name="id_pasien" class="form-control" required>
                                    <option value="">-- Pilih Pasien --</option>
                                    @foreach ($pasien as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama_pasien }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Riwayat Penyakit --}}
                            <div class="form-group">
                                <label for="riwayat_penyakit">Riwayat Penyakit</label>
                                <input name="riwayat_penyakit" class="form-control" rows="3" required>{{ old('riwayat_penyakit') }}</input>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
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
                            <form action="{{ route('riwayatPenyakitImport') }}" method="POST"
                                enctype="multipart/form-data">
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
