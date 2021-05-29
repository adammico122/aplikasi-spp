@extends('layout.main')
@section('title', 'Data Transaksi')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-inbox bg-pink"></i>
                        <div class="d-inline">
                            <h5>Data Transaksi</h5>
                            <span>Anda Telah Mengakses Halaman Transaksi</span>
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
                                <a href="/transaksi">Transaksi</a>
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
                        <h3>Transaksi</h3>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="table_transaksi" class="table table-striped table-bordered nowrap"> 
                                <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>Tagihan</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Terbayarkan</th>
                                    <th>Sisa/Kurang</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Petugas</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                              <!-- Table Body Dihilangkan Apabila Kita Memanggil Menggunakan AJAX Jquery -->
                                <tfoot>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>Tagihan</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Terbayarkan</th>
                                    <th>Sisa/Kurang</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Petugas</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <a href="javascript:void(0)" class="btn btn-pill btn-primary" id="tombol-tambah">Transaksi Baru</a>
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

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Pilih Kelas</label>
                                <div class="col-sm-12">
                                    <select id="id_kelas" class="form-control required">
                                        <option value="" holder>- Pilih Kelas -</option>
                                        @foreach ($kelas as $item)
                                        <option value="{{$item->id_kelas}}">{{$item->nama_kelas}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Pilih Siswa</label>
                                <div class="col-sm-12">
                                    <select name="id_siswa" id="id_siswa" class="form-control required">
                                        <option value="" holder>- Pilih Siswa -</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Bulan & Jumlah Bayar</label>
                                <div class="col-sm-12">
                                    <select id="bulan" name="id_iuran" class="form-control required">
                                        <option value="" holder>- Pilih Bulan -</option>
                                        @foreach ($iuran as $item)
                                        <option value="{{$item->id_iuran}}">{{$item->bulan_bayar}} - [ @currency($item->total_bayar) ]</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Jumlah Diterima</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" name="jmlh_pembayaran" id="jmlh_pembayaran" value="" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Sisa/Kurang</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" name="sisa" value="" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Bulan</label>
                                <div class="col-sm-12">
                                    <select id="status" name="status" class="form-control required">
                                        <option value="" holder>- Pilih Bulan -</option>
                                        <option value="Lunas">Lunas</option>
                                        <option value="Belum Lunas">Belum Lunas</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Tanggal Pembayaran</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" name="tanggal_pembayaran" id="tanggal_pembayaran" value="" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Nama Petugas</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="nama_petugas" id="nama_petugas" value="" required>
                                </div>
                            </div>

                            <input type="hidden" name="id_transaksi" id="id_transaksi">
                        </div>

                        <div class="col-sm-offset-2 col-sm-12">
                            <button type="submit" class="btn btn-primary btn-block" id="button-save"
                                value="create-post">Simpan
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
                <p>Data Transaksi Yang Dipilih Akan Dihapus Secara Permanent, Anda yakin?</p>
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
            $('#button-save').val("create-post"); // Valuenya Menjadi Create-Post
            $('#id_transaksi').val(''); //valuenya menjadi kosong
            $('#form-save').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Form Tambah Data Kelas"); //valuenya tambah guru baru
            $('#tambah-edit-modal').modal('show'); //modal tampil
        });

        // Datatable Table guru - AJAX Jquery
        $(document).ready(function() {
           $('#table_transaksi').DataTable({ // #table_guru Adalah Nama ID Dari Table ID. Apabila Anda Menggunakan Class Maka Gunakan . Bukan #
                processing : true,
                serverSide : true,  // Guna Serverside Untuk Memanggil 10 Data Dari Keseluruhan Data Tiap Pagination ( Tergantung Seberapa Banyak Colum Yang Anda Panggil ).
                ajax : {
                    url: "{{ url('/transaksi') }}",
                    type: "GET" // Kenapa Type Get? Karena Di Web.php Route('guru') Kita Bertype Route::get.
                },
                columns: [ // Semua Data Columns Diambil Dari guruModel:: Dari guruController.
                    {data:'nama_siswa',name:'nama_siswa'}, // [0]
                    {data:'total_bayar',name:'total_bayar', render: $.fn.dataTable.render.number( '.', '.', '', 'Rp. ' )}, // [1]
                    {data:'bulan_bayar',name:'bulan_bayar'}, // [1]
                    {data:'tahun_bayar',name:'tahun_bayar'}, // [1]
                    {data:'jmlh_pembayaran',name:'jmlh_pembayaran', render: $.fn.dataTable.render.number( '.', '.', '', 'Rp. ' )}, // [2]
                    {data:'sisa',name:'sisa', render: $.fn.dataTable.render.number( '.', '.', '', 'Rp. ' )}, // [3]
                    {data:'status',name:'status'}, // [3]
                    {data:'tanggal_pembayaran',name:'tanggal_pembayaran'}, // [3]
                    {data:'nama_petugas',name:'nama_petugas'}, // [3]
                    {data:'action',name:'action'}, // Button Action Dipanggil Melalui guruController.
                ],
                order: [
                    [0,'asc'] // Untuk Memanggil Array Kita Harus Menggunakan Urutan Angka, Array Dimulai Dari 0. Disini Angka 0 = Nama Guru Dan ASC Berarti Ascending/Data Diurutkan Dari Atas.
                ]
            });
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
                        url: "{{ route('add.transaksi') }}", // url simpan data
                        type: "POST", // karena simpan kita pakai method POST
                        dataType: 'json', // data tipe kita kirim berupa JSON
                        success: function (data) { // jika berhasil 
                            $('#form-save').trigger("reset"); // form reset
                            $('#tambah-edit-modal').modal('hide'); // modal hide
                            $('#button-save').html('Simpan'); // tombol simpan
                            var oTable = $('#table_transaksi').dataTable(); // inialisasi datatable
                            oTable.fnDraw(false); // reset datatable
                            iziToast.success({ // tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Transaksi Baru Berhasil Ditambahkan!',
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

        //TOMBOL EDIT DATA PER guru DAN TAMPIKAN DATA BERDASARKAN ID guru KE MODAL
        //ketika class edit-post yang ada pada tag body di klik maka
        $('body').on('click', '.edit-post', function () {
            var data_transaksi = $(this).data('id');
            $.get('transaksi/' + data_transaksi + '/edit', function (data) {
                $('#modal-judul').html("Edit Post");
                $('#button-save').val("edit-post");
                $('#tambah-edit-modal').modal('show');
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
                $('#id_transaksi').val(data.id_transaksi);
                $('#id_siswa').val(data.id_siswa);
                $('#id_iuran').val(data.id_iuran);
                $('#jmlh_pembayaran').val(data.jmlh_pembayaran);
                $('#sisa').val(data.sisa);
                $('#status').val(data.status);
                $('#tanggal_pembayaran').val(data.tanggal_pembayaran);
                $('#nama_petugas').val(data.nama_petugas);
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
                url: "transaksi/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                    $('#delete-button').text('Hapus Data'); //set text untuk tombol hapus
                },
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#table_transaksi').dataTable();
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
        $(document).ready(function() {
            $('#id_kelas').on('change', function() {
                var siswaId = $(this).val();
                if(siswaId) {
                    $.ajax({
                        url: 'getSiswa/ajax/' + siswaId,
                        type: "GET",
                        dataType: "json",
                        success: function($data) {
                            $('select[name="id_siswa"]').empty();
                            $.each($data, function(key, value) {
                                $('select[name="id_siswa"]').append(
                                    '<option value="' + 
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else { 
                    $('select[name="id_siswa"]').empty();
                } 
            });
        });
</script>
@endsection