@extends('layouts.template')

@section('tab')
Detail Petugas UKS
@endsection

@section('title')
Detail Petugas UKS
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Petugas
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Nama Petugas</th>
                            <th>: {{$petugas->nama_petugas}}</th>
                        </tr>
                        <tr>
                            <th>Nomor Induk Petugas</th>
                            <th>: {{($petugas->nomor_induk_petugas)}}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
