@extends('layouts.template')

@section('tab')
    Detail Medical Check Up
@endsection

@section('title')
    Detail Medical Check Up
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Detail Medical Check Up
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">

                            <tr>
                                <th>Nama</th>
                                <th>: {{ $mcu->nama }}</th>
                            </tr>
                            <th>Jabatan</th>
                            <th>: {{ $mcu->jabatan->nama_jabatan }}</th>
                            </tr>
                            </tr>
                            <th>Medical Check Up</th>
                            <th>:
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#mcuModal"
                                    class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                            </th>
                            </tr>
                            <tr>
                                <th>Diupload</th>
                                <th>: {{ $mcu->created_at->format('d M Y / H:m:s') }}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="mcuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Medical Check Up</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card shadow p-3 bg-white rounded">
                            <img src="{{ url('storage/', $mcu->mcu) }}" class="img-fluid" alt="..."
                                    style="max-width: 100%; height:auto; display: block;margin-left: auto;margin-right: auto;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('storage/', $mcu->mcu) }}" target="blank" class="btn btn-outline-primary">Preview</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
