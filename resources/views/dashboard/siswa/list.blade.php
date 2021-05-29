@extends('layout.main')
@section('title', 'Data Siswa')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-inbox bg-pink"></i>
                        <div class="d-inline">
                            <h5>Data Siswa</h5>
                            <span>Anda Telah Mengakses Halaman Data Siswa</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="/siswa">Siswa</a>
                            </li>

                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-block">
                        <h3>Data Siswa</h3>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="table_siswa"
                                   class="table table-striped table-bordered nowrap"> <!-- Jangan Lupa Menambahkan table id="nama_table" -->
                                <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>No Telepon</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                              <!-- Table Body Dihilangkan Apabila Kita Memanggil Menggunakan AJAX Jquery -->
                                <tfoot>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>No Telepon</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <a href="javascript:void(0)" class="btn btn-pill btn-primary" id="tombol-tambah">Tambah Siswa</a>
            </div>
        </div>
    </div>
</div>

 <!-- MULAI MODAL FORM TAMBAH/EDIT-->
 <div class="modal fade" id="tambah-edit-modal" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul"></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="form-save" name="form-save" class="form-horizontal">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">

                            <input type="hidden" name="id_siswa" id="id_siswa">

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Nama Siswa</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa"
                                        value="" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Pilih Kelas</label>
                                <div class="col-sm-12">
                                    <select name="id_kelas" id="id_kelas" class="form-control required">
                                        <option value="" holder>- Pilih Kelas -</option>
                                        @foreach ($kelas as $item)
                                        <option value="{{ $item->id_kelas }}">{{ $item->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Nomer Induk Kependudukan</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nik" name="nik" value=""
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Nomer Telepon</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="no_tlp" name="no_tlp" value=""
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Jenis Kelamin</label>
                                <div class="col-sm-12">
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control required">
                                        <option value="" holder>- Pilih Jenis Kelamin -</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Agama</label>
                                <div class="col-sm-12">
                                    <select name="agama" id="agama" class="form-control required">
                                        <option value="" holder>- Pilih Agama -</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Alamat</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="alamat" id="alamat" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Tanggal Lahir</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Nama Ayah</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Nama ibu</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Pekerjaan Ayah</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Pekerjaan Ibu</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" required>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-offset-2 col-sm-12">
                            <button type="submit" class="btn btn-primary btn-block" id="button-save"
                                value="create">Simpan
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- AKHIR MODAL -->

<!-- MULAI MODAL KONFIRMASI DELETE-->

<div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Data Siswa Yang Dipilih Akan Dihapus Secara Permanent, Anda yakin?</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" name="delete-button" id="delete-button">Hapus
                    Data</button>
            </div>
        </div>
    </div>
</div>

<!-- AKHIR MODAL -->
@endsection
@section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
    <script type="text/javascript">
    // Token @CSRF - Element Wajib ( Jangan dihapus! )
    // Cara Install Datatable Masuk Ke CMD/GitBash/Terminal Kemudian Ketikkan:
    // Composer require yajra/laravel-datatables-oracle:"~9.0" //
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ini Adalah Token @Csrf / _token
                }
            });
        });

        // Button Tambah Data Trigger
        // Jika Button Diclick Maka Akan Menampilkan
        $('#tombol-tambah').click(function () {
            $('#button-save').val("create"); // Valuenya Menjadi Create
            $('#id_siswa').val(''); //valuenya menjadi kosong
            $('#form-save').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Form Tambah Data Siswa"); //valuenya tambah Siswa baru
            $('#tambah-edit-modal').modal('show'); //modal tampil
        });

        // Datatable Table Siswa - AJAX Jquery
        $(document).ready(function() {
           $('#table_siswa').DataTable({ // #table_siswa Adalah Nama ID Dari Table ID. Apabila Anda Menggunakan Class Maka Gunakan . Bukan #
                responsive: true,
                processing : true,
                serverSide : true,  // Guna Serverside Untuk Memanggil 10 Data Dari Keseluruhan Data Tiap Pagination ( Tergantung Seberapa Banyak Colum Yang Anda Panggil ).
                ajax : {
                    url: "{{ route('siswa') }}",
                    type: "GET" // Kenapa Type Get? Karena Di Web.php Route('siswa') Kita Bertype Route::get.
                },
                columns: [ // Semua Data Columns Diambil Dari SiswaModel:: Dari SiswaController.
                    {data:'nama_siswa',name:'nama_siswa'}, // [0]
                    {data:'nama_kelas',name:'nama_kelas'}, // [1]
                    {data:'jenis_kelamin',name:'jenis_kelamin'}, // [2]
                    {data:'agama',name:'agama'}, // [4]
                    {data:'tanggal_lahir',name:'tanggal_lahir'}, // [5]
                    {data:'no_tlp',name:'no_tlp'}, // [6]
                    {data:'action',name:'action'}, // Button Action Dipanggil Melalui SiswaController.
                ],
                order: [
                    [0,'asc'] // Untuk Memanggil Array Kita Harus Menggunakan Urutan Angka, Array Dimulai Dari 0. Disini Angka 0 = Nama Siswa Dan ASC Berarti Ascending/Data Diurutkan Dari Atas.
                ],
                columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -1 }
                  
                ] 
            });
            new $.fn.dataTable.FixedHeader('#table_siswa');
        });

        // Simpan & Update Data Dan Validation ( Client Side )
        // jika id = form-save panjangnya lebih dari 0 atau bisa dibilang terdapat data dalam form tersebut maka
        // jalankan jquery validator terhadap setiap inputan dll dan eksekusi script ajax untuk simpan data
        if ($("#form-save").length > 0) {
            $("#form-save").validate({
                submitHandler: function (form) {
                    var actionType = $('#button-save').val();
                    $('#button-save').html('Mengirim Data..');
                    $.ajax({
                        data: $('#form-save')
                            .serialize(), // function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('add.siswa') }}", // url simpan data
                        type: "POST", // karena simpan kita pakai method POST
                        dataType: 'json', // data tipe kita kirim berupa JSON
                        success: function (data) { // jika berhasil 
                            $('#form-save').trigger("reset"); // form reset
                            $('#tambah-edit-modal').modal('hide'); // modal hide
                            $('#button-save').html('Simpan'); // tombol simpan
                            var oTable = $('#table_siswa').dataTable(); // inialisasi datatable
                            oTable.fnDraw(false); // reset datatable
                            iziToast.success({ // tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Data Siswa Baru Berhasil Ditambahkan!',
                                message: '{{ Session('
                                success ')}}',
                                position: 'bottomRight'
                            });
                        },
                        error: function (data) { // jika error tampilkan error pada console
                            console.log('Error:', data);
                            $('#button-save').html('Simpan');
                        }
                    });
                }
            })
        }

        //TOMBOL EDIT DATA PER Siswa DAN TAMPIKAN DATA BERDASARKAN ID Siswa KE MODAL
        //ketika class edit-post yang ada pada tag body di klik maka
        $('body').on('click', '.edit-post', function () {
            var data_id_siswa = $(this).data('id_siswa');
            $.get('siswa/' + data_id_siswa + '/edit', function (data) {
                $('#modal-judul').html("Edit Post");
                $('#button-save').val("edit-post");
                $('#tambah-edit-modal').modal('show');
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
                $('#id_siswa').val(data.id_siswa);
                $('#nama_siswa').val(data.nama_siswa);
                $('#id_kelas').val(data.id_kelas);
                $('#nik').val(data.nik);
                $('#no_tlp').val(data.no_tlp);
                $('#jenis_kelamin').val(data.jenis_kelamin);
                $('#agama').val(data.agama);
                $('#alamat').val(data.alamat);
                $('#tanggal_lahir').val(data.tanggal_lahir);
                $('#nama_ayah').val(data.nama_ayah);
                $('#nama_ibu').val(data.nama_ibu);
                $('#pekerjaan_ayah').val(data.pekerjaan_ayah);
                $('#pekerjaan_ibu').val(data.pekerjaan_ibu);
            })
        });
        //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
        $(document).on('click', '.delete', function () {
            dataId = $(this).attr('id');
            $('#konfirmasi-modal').modal('show');
        });
        //jika tombol hapus pada modal konfirmasi di klik maka
        $('#delete-button').click(function () {
            $.ajax({
                url: "siswa/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                    $('#delete-button').text('Hapus Data'); //set text untuk tombol hapus
                },
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#table_siswa').dataTable();
                        oTable.fnDraw(false); //reset datatable
                    });
                    iziToast.warning({ //tampilkan izitoast warning
                        title: 'Data Berhasil Dihapus',
                        message: '{{ Session('
                        delete ')}}',
                        position: 'bottomRight'
                    });
                }
            })
        });
</script>
@endsection