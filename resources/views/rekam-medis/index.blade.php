@extends('layouts.template')

@section('tab')
Rekam Medis
@endsection

@section('title')
Rekam Medis
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div style="justify-content: right">
                        <form class="navbar-search col-md-3 mb-3" action="{{route('rekam-medis.search')}}" method="get">
                            <div class="input-group">
                              <input name="search" type="text" class="form-control bg-light border-1 small"
                                placeholder="Cari Pasien.." aria-label="Search" aria-describedby="basic-addon2"
                                style="border-color: #3f51b5;">
                              <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                  <i class="fas fa-search fa-sm"></i>
                                </button>
                              </div>
                            </div>
                          </form>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>ID Rekam Medis</th>
                                <th>Nama Pasien</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasien as $row)
                            <tr class="text-center">
                                <td>RM-{{$row->id}}</td>
                                <td>{{$row->nama_pasien}}</td>
                                <td>{{$row->tanggal_lahir}}</td>
                                <td>{{$row->jenis_kelamin}}</td>
                                <td>{{$row->jabatan->nama_jabatan}}</td>
                                <td>
                                    <a href="{{route('rekam-medis.detail', $row->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i> Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$pasien->appends(Request::all())->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
