@extends('layout.main')
    @section('title', 'Biodata')
        @section('content')
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="profile-pic mb-20">
                                        <img src="{{asset('Template/')}}//img/user.jpg" width="150" class="rounded-circle" alt="user">
                                        <h4 class="mt-20 mb-0">{{ $guru->nama_guru }}</h4>
                                        <p class="text-muted">{{ $guru->nik }}</p>
                                        <p class="text-muted mt-1">{{ $guru->alamat }}</p>
                                    </div>
                                    <div class="badge badge-pill badge-success">{{ $guru->agama }}</div>
                                    <div class="badge badge-pill badge-success">{{ $guru->jenis_kelamin }}</div>
                                    <div class="badge badge-pill badge-success">{{ $guru->kewarganegaraan }}</div>
                                    <div class="badge badge-pill badge-primary mt-1">{{ $guru->universitas }}</div>
                                </div>
                                <div class="p-4 border-top">
                                    <div class="row text-center">
                                        <div class="col-12 border-right">
                                            <a href="https://wa.me/{{ $guru->no_tlpn }}" class="link d-flex align-items-center justify-content-center text-success"><i class="ik ik-message-square f-20 mr-5"></i>Whatsapp</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 border-top">
                                    <div class="row text-center">
                                        <div class="col-12 border-right">
                                            <a href="/guru" class="link d-flex align-items-center justify-content-center text-primary"><i class="ik ik-log-out f-20 mr-5"></i>Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
            @endsection