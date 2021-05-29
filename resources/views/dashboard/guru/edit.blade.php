@extends('layout.main')
@section('title', 'Edit Guru')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>Guru</h5>
                            <span>Ini Adalah Halaman Edit Data Guru</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="/guru">Guru</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $guru->nama_guru }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="min-height: 484px;">
                    <div class="card-header"><h3>Edit Data</h3></div>
                    <div class="card-body">
                        <form class="forms-sample" id="form" method="POST" action="/guru/{{$guru->id_guru}}/edit">
                            @csrf
                            <div class="row m-lr-0 mb-2">
                                <div class="col-md-4">
                                    <div class="m-b-4"><b>Nama Lengkap</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                                    <div class="fs-12">Masukkan nama guru dengan benar. Contoh: Adam</div>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="nama_guru" id="nama_guru" value="{{ $guru->nama_guru }}" placeholder="Masukkan Nama Guru">
                                </div>
                            </div>

                            <div class="row m-lr-0 mt-3">
                                <div class="col-md-4">
                                    <div class="m-b-4"><b>Nomor Induk Kependudukan ( NIK )</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                                    <div class="fs-12">Contoh: 351500000020002</div>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="nik" id="nik" value="{{ $guru->nik }}" placeholder="Masukkan NIK">
                                </div>
                            </div>

                            <div class="row m-lr-0 mt-3">
                                <div class="col-md-4">
                                    <div class="m-b-4"><b>Jenis Kelamin</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                                    <div class="fs-12">Pilih jenis kelamin yang sesuai.</div>
                                </div>
                                <div class="col-md-8">
                                    <select class="custom-select" name="jenis_kelamin" id="jenis_kelamin" required>
                                        <option value="" holder>- Pilih Jenis Kelamin -</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                        </select>
                                </div>
                            </div>
                            <div class="row m-lr-0 mt-3">
                                <div class="col-md-4">
                                    <div class="m-b-4"><b>Nomor Telepon</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                                    <div class="fs-12">Contoh: 0812XXXXXXXX</div>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="no_tlpn" id="no_tlpn" value="{{ $guru->no_tlpn }}" placeholder="Masukkan Nomor Telepon">
                                </div>
                            </div>
                            <div class="row m-lr-0 mt-3">
                                <div class="col-md-4">
                                    <div class="m-b-4"><b>Agama</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                                    <div class="fs-12">Pilih Agama yang sesuai.</div>
                                </div>
                                <div class="col-md-8">
                                    <select class="custom-select" name="agama" id="agama" required>
                                        <option value="" holder>- Pilih Agama -</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Khonghucu">Khonghucu</option>
                                        </select>
                                </div>
                            </div>
                            <div class="row m-lr-0 mt-3 mb-2">
                                <div class="col-md-4">
                                    <div class="m-b-4"><b>Alamat</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                                    <div class="fs-12">Masukkan alamat rumah. Contoh: Sidoarjo, Sidokare, Perum. Sidokare Indah No XX</div>
                                </div>
                                <div class="col-md-8">
                                    <textarea rows="4" class="form-control" name="alamat" id="alamat" value="{{ $guru->alamat }}"></textarea>
                                </div>
                            </div>
                            <div class="row m-lr-0 mt-3">
                                <div class="col-md-4">
                                    <div class="m-b-4"><b>Lulusan</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                                    <div class="fs-12">Pilih Lulusan yang sesuai.</div>
                                </div>
                                <div class="col-md-8">
                                    <select class="custom-select" name="lulusan" id="lulusan" required>
                                        <option value="" holder>- Pilih Lulusan -</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                        <option value="D1">D1</option>
                                        <option value="D2">D2</option>
                                        <option value="D3">D3</option>
                                        <option value="D4">D4</option>
                                        </select>
                                </div>
                            </div>
                            <div class="row m-lr-0 mt-3">
                                <div class="col-md-4">
                                    <div class="m-b-4"><b>Universitas</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                                    <div class="fs-12">Masukkan Universitas. Contoh: Muhammadiyah</div>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="universitas" id="universitas" value="{{ $guru->universitas }}" placeholder="Masukkan Nama Universitas">
                                </div>
                            </div>
                            <div class="row m-lr-0 mt-3">
                                <div class="col-md-4">
                                    <div class="m-b-4"><b>kewarganegaraan</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                                    <div class="fs-12">Pilih kewarganegaraan yang sesuai.</div>
                                </div>
                                <div class="col-md-8">
                                    <select class="custom-select" name="kewarganegaraan" id="kewarganegaraan" required>
                                        <option value="" holder>- Pilih kewarganegaraan -</option>
                                        <option value="WNI">Warga Negara Indonesia</option>
                                        <option value="WNA">Warga Negara Asing</option>
                                        </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary ml-2 mt-3 btn-update">Update</button>
                            <button class="btn btn-light ml-2 mt-3" value="reset">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            @endsection
            @section('script')
            <script type="text/javascript">
            /*

                $(document).ready(function() {
                    $(".btn-update").click(function(e){
                        e.preventDefault();
            
            
                        var _token          = $("input[name='_token']").val();
                        var id_guru         = $('#id_guru').val(data[0].id_guru);
                        var nama_guru       = $("input[name='nama_guru']").val();
                        var nik             = $("input[name='nik']").val();
                        var jenis_kelamin   = $("select[name='jenis_kelamin']").val();
                        var no_tlpn         = $("input[name='no_tlpn']").val();
                        var agama           = $("select[name='agama']").val();
                        var alamat          = $("textarea[name='alamat']").val();
                        var lulusan         = $("select[name='lulusan']").val();
                        var universitas     = $("input[name='universitas']").val();
                        var kewarganegaraan = $("select[name='kewarganegaraan']").val();
            
            
                        $.ajax({
                            var data_id = $(this).(data[0]['id_guru']);
                            url: 'pegawai/' + data_id + '/edit',
                            type:'POST',
                            data: {
                                    _token:_token,
                                    id_guru:id_guru, 
                                    nama_guru:nama_guru, 
                                    nik:nik, 
                                    jenis_kelamin:jenis_kelamin, 
                                    no_tlpn:no_tlpn,
                                    agama:agama,
                                    alamat:alamat,
                                    lulusan:lulusan,
                                    universitas:universitas,
                                    kewarganegaraan:kewarganegaraan,
                                    },
                            success: function(data) {
                                if($.isEmptyObject(data.error)){
                                    alert(data.success);
                                }else{
                                    printErrorMsg(data.error);
                                }
                            }
                        });
            
            
                    }); 
            
            
                    function printErrorMsg (msg) {
                        $(".print-error-msg").find("ul").html('');
                        $(".print-error-msg").css('display','block');
                        $.each( msg, function( key, value ) {
                            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                        });
                    }
                });
            
            */
            </script>
            @endsection