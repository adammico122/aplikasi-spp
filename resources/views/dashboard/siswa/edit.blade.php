@extends('layout.main')
@section('title', 'Edit ')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>Edit Siswa {{ $siswa->nama_siswa }}</h5>
                            <span>Anda Berada Dihalaman Edit Data</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="/siswa">Siswa</a></li>
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
                        <form class="forms-sample" id="form" method="POST" action="/siswa/{{$siswa->id_siswa}}/edit">
                            @csrf
                            <div class="row m-lr-0 mb-2">
                                <div class="col-md-4">
                                    <div class="m-b-4"><b>Nama Lengkap</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                                    <div class="fs-12">Masukkan nama siswa dengan benar. Contoh: Adam</div>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" value="{{ $siswa->nama_siswa }}" placeholder="Masukkan Nama Siswa">
                                </div>
                            </div>

                            <div class="row m-lr-0 mt-3">
                                <div class="col-md-4">
                                    <div class="m-b-4"><b>Kelas</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                                    <div class="fs-12">Pilih kelas yang sesuai.</div>
                                </div>
                                <div class="col-md-8">
                                    <select class="custom-select" name="id_kelas" id="id_kelas" required>
                                        <option value="" holder>- Pilih Kelas -</option>
                                        @foreach ($kelas as $item)
                                        <option value="{{ $item->id_kelas }}">{{ $item->nama_kelas }}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>

                            <div class="row m-lr-0 mt-3">
                                <div class="col-md-4">
                                    <div class="m-b-4"><b>Nomor Induk Kependudukan ( NIK )</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                                    <div class="fs-12">Contoh: 351500000020002</div>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="nik" id="nik" value="{{ $siswa->nik }}" placeholder="Masukkan NIK">
                                </div>
                            </div>
                            <div class="row m-lr-0 mt-3">
                                <div class="col-md-4">
                                    <div class="m-b-4"><b>Nomor Telepon</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                                    <div class="fs-12">Contoh: 0812XXXXXXXX</div>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="no_tlp" id="no_tlp" value="{{ $siswa->no_tlp }}" placeholder="Masukkan Nomor Telepon">
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
                                    <textarea rows="4" class="form-control" name="alamat" id="alamat" value="{{ $siswa->alamat }}"></textarea>
                                </div>
                            </div>
                            <div class="row m-lr-0 mt-3">
                                <div class="col-md-4">
                                    <div class="m-b-4"><b>Tanggal Lahir</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                                    <div class="fs-12">Masukkan tanggal lahir. Contoh: 1999/01/01</div>
                                </div>
                                <div class="col-md-8 mt-2">
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}">
                                </div>
                            </div>
                            <div class="row m-lr-0 mt-3">
                                <div class="col-md-4">
                                    <div class="m-b-4"><b>Nama Ayah</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                                    <div class="fs-12">Masukkan nama orang tua. Contoh: Dobleh, Jamal</div>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" value="{{ $siswa->nama_ayah }}" placeholder="Masukkan Nama Ayah">
                                </div>
                            </div>
                            <div class="row m-lr-0 mt-3">
                                <div class="col-md-4">
                                    <div class="m-b-4"><b>Nama Ibu</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                                    <div class="fs-12">Masukkan nama orang tua. Contoh: Sri, Dewi</div>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" value="{{ $siswa->nama_ibu }}" placeholder="Masukkan Nama Ibu">
                                </div>
                            </div>
                            <div class="row m-lr-0 mt-3">
                                <div class="col-md-4">
                                    <div class="m-b-4"><b>Pekerjaan Ayah</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                                    <div class="fs-12">Masukkan pekerjaan orang tua. Contoh: Wirausaha</div>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" value="{{ $siswa->pekerjaan_ayah }}" placeholder="Masukkan Pekerjaan Ayah">
                                </div>
                            </div>
                            <div class="row m-lr-0 mt-3">
                                <div class="col-md-4">
                                    <div class="m-b-4"><b>Pekerjaan Ibu</b> <span class="badge badge-pill badge-primary">Harus</span></div>
                                    <div class="fs-12">Masukkan pekerjaan orang tua. Contoh: Ibu Rumah Tangga</div>
                                </div>
                                <div class="col-md-8 mt-1">
                                    <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" value="{{ $siswa->pekerjaan_ibu }}" placeholder="Masukkan Pekerjaan Ibu">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary ml-2 mt-3">Update</button>
                            <button class="btn btn-light ml-2 mt-3" value="reset">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            @endsection
            /*
            $(document).on('submit', '#form', function(edit) {
                edit.preventDefault()
                let url = $(this).attr('action')
                let form = new FormData(this)
                
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            $.ajax({
                type: "POST",
                url: url,
                data: form,
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response)
                    }
                })
            }); 
            */