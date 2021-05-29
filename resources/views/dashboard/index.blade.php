@extends('layout.main')
@section('title', 'Dashboard')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="card-group mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h3 class="text-success">{{$all_transaksi}}</h3>
                            <p class="card-subtitle text-muted fw-500">Transaksi</p>
                        </div>
                        <div class="icon"><i class="ik ik-shopping-cart"></i></div>
                    </div>
                    <div class="progress mt-3 mb-1" style="height: 6px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    <div class="text-muted f12">
                        <span>Transaksi Bulan Ini</span>
                        <span class="float-right text-success">@currency($bot_tran)</span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h3 class="text-primary">{{$siswa_all}}</h3>
                            <p class="card-subtitle text-muted fw-500">Siswa</p>
                        </div>
                        <div class="icon">
                            <i class="ik ik-user"></i>
                        </div>
                    </div>
                    <div class="progress mt-3 mb-1" style="height: 6px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    <div class="text-muted f12">
                        <span>Tahun Ini</span>
                        <span class="float-right">+{{$siswa_bot}}</span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h3 class="text-danger">@currency($iuran_top)</h3>
                            <p class="card-subtitle text-muted fw-500">Hari Ini</p>
                        </div>
                        <div class="icon">
                            <i class="ik ik-dollar-sign"></i>
                        </div>
                    </div>
                    <div class="progress mt-3 mb-1" style="height: 6px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    <div class="text-muted f12">
                        <span>Jumlah Iuran</span>
                        <span class="float-right">{{$iuran_bot}}</span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h3 class="text-info">{{$guru_top}}</h3>
                            <p class="card-subtitle text-muted fw-500">Guru</p>
                        </div>
                        <div class="icon">
                            <i class="ik ik-user"></i>
                        </div>
                    </div>
                    <div class="progress mt-3 mb-1" style="height: 6px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    <div class="text-muted f12">
                        <span>Tahun Ini</span>
                        <span class="float-right">+{{$guru_bot}}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="profile-pic mb-20">
                            <img src="{{asset('Template/')}}//img/user.jpg" width="150" class="rounded-circle" alt="user">
                            <h4 class="mt-20 mb-0">Adam Mico</h4>
                            <p class="text-muted">Admin</p>
                            <p class="text-muted mt-1">Hanya Seorang Pelajar Yang Kebetulan Memiliki Minat&Bakat Di Dunia IT</p>
                        </div>
                        <div class="badge badge-pill badge-warning">Developers</div>
                        <div class="badge badge-pill badge-warning">Owner</div>
                    </div>
                    <div class="p-4 border-top">
                        <div class="row text-center">
                            <div class="col-12 border-right">
                                <a href="https://wa.me/6283136848603" class="link d-flex align-items-center justify-content-center text-success"><i class="ik ik-message-square f-20 mr-5"></i>Whatsapp</a>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 border-top">
                        <div class="row text-center">
                            <div class="col-6 border-right">
                                <a href="https://www.facebook.com/F1F2F12" class="link d-flex align-items-center justify-content-center text-primary"><i class="ik ik-facebook f-20 mr-5"></i>Facebook</a>
                            </div>
                            <div class="col-6">
                                <a href="https://www.instagram.com/adamf.exe" class="link d-flex align-items-center justify-content-center text-danger"><i class="ik ik-instagram f-20 mr-5"></i>Instagram</a>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
                        <div class="col-xs-4 col-lg-4 col-md-4">
                            <div class="card">
                                <div class="position-relative">
                                    <a href="/transaksi">
                                    <img class="card-img-top" src="{{asset('Template') }}/img/Transaksi.jpg" alt="Card image cap">
                                    <span class="badge badge-pill badge-primary position-absolute badge-top-left">Transaksi</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="mb-2 text-center"><b>Transaksi</b></h5>
                                    <footer>
                                        <p class="text-muted text-small mb-0 font-weight-light text-center">Transaksi Apapun Makin Mudah Menggunakan <b class="text-primary">MySPP</b></p>
                                    </footer>
                                </a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="position-relative">
                                    <a href="/guru">
                                    <img class="card-img-top" src="{{asset('Template') }}/img/Guru.jpg" alt="Card image cap">
                                    <span class="badge badge-pill badge-primary position-absolute badge-top-left">Guru</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="mb-2 text-center"><b>Guru</b></h5>
                                    <footer>
                                        <p class="text-muted text-small mb-0 font-weight-light text-center">Check Seluruh Biodata Guru/Pengajar Anda Di <b class="text-primary">MySPP</b></p>
                                    </footer>
                                </a>
                                </div>
                                </div>
                        </div>

                        <div class="col-xs-4 col-lg-4 col-md-4">
                            <div class="card">
                                <div class="position-relative">
                                    <a href="/siswa">
                                    <img class="card-img-top" src="{{asset('Template') }}/img/Siswa.jpg" alt="Card image cap">
                                    <span class="badge badge-pill badge-primary position-absolute badge-top-left">Siswa</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="mb-2 text-center"><b>Siswa</b></h5>
                                    <footer>
                                        <p class="text-muted text-small mb-0 font-weight-light text-center">Permudah Pendaataan Siswa Anda Menggunakan <b class="text-primary">MySPP</b></p>
                                    </footer>
                                </a>
                                </div>
                                </div>
                                <div class="card">
                                    <div class="position-relative">
                                        <a href="/iuran">
                                        <img class="card-img-top" src="{{asset('Template') }}/img/Bill.jpg" alt="Card image cap">
                                        <span class="badge badge-pill badge-primary position-absolute badge-top-left">Iuran</span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="mb-2 text-center"><b>Tagihan</b></h5>
                                        <footer>
                                            <p class="text-muted text-small mb-0 font-weight-light text-center">Bayar Tagihan Makin Mudah Menggunkan <b class="text-primary">MySPP</b></p>
                                        </footer>
                                    </a>
                                    </div>
                                    </div>
                            </div>
                        </div>
                </div>
</div>
@endsection
