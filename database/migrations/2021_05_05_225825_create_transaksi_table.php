<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->string('id_siswa', 20);
            $table->string('id_iuran', 20);
            $table->string('jmlh_pembayaran', 20);
            $table->string('sisa', 20);
            $table->enum('Status', ['Lunas', 'Belum Lunas']);
            $table->date('tanggal_pembayaran');
            $table->string('nama_petugas', 250);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
