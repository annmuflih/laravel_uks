@extends('layouts.template')

@section('tab')
Detail info
@endsection

@section('title')
Detail info
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail info
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Judul info</th>
                            <th>: {{$info->judul_info}}</th>
                        </tr>
                        <tr>
                            <th>Isi info</th>
                            <th>: {{($info->isi_info)}}</th>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <th>: {{($info->penerbit)}}</th>
                        </tr>
                        <tr>
                            <th>Tanggal Terbit</th>
                            <th>: {{($info->tanggal_terbit)}}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
