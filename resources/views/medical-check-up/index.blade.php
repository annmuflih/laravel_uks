@extends('layouts.template')

@section('tab')
    Medical Check Up
@endsection

@section('title')
    Upload Medical Check Up
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success"><i
                                class="fa fa-plus"></i> Upload</a>

                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Diupload</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mcu as $row)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration + $mcu->perpage() * ($mcu->currentpage() - 1) }}</td>
                                        <td>{{ $row->pasien->nama ?? '-' }}</td>
                                        <td>
                                            @if ($row->status == 'Belum Terverifikasi')
                                                <span class="badge bg-danger" style="color: white"> <i
                                                        class="fas fa-times"></i> Belum Terverifikasi</span>
                                            @else
                                                <span class="badge bg-success" style="color: white"> <i
                                                        class="far fa-check-circle"></i> Terverifikasi</span>
                                            @endif
                                        </td>
                                        <td>{{ $row->created_at->format('d M Y') }}</td>
                                        <td>
                                            <form action="{{ route('medical-check-up.destroy', $row->id) }}"
                                                onsubmit="return confirm('Hapus pasien {{ $row->nama_pasien }} ?')"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('medical-check-up.show', $row->id) }}"
                                                    class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                @if (Auth::user()->role == 'admin')
                                                    <a href="{{ route('medical-check-up.edit', $row->id) }}"
                                                        class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                @elseif (Auth::user()->role == 'petugas')
                                                    <a href="{{ route('medical-check-up.edit', $row->id) }}"
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
                        {{ $mcu->appends(Request::all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Tambah Medical Check Up</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('medical-check-up.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Nama Pasien</label>
                                <select name="pasien_id" class="form-control" required>
                                    <option value="">-- Pilih Pasien --</option>
                                    @foreach ($pasien as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama_pasien }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Upload Medical Check Up</label>
                                <input type="file" name="mcu" required='required' class="form-control">
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
    </div>
    @include('sweetalert::alert')
@endsection
