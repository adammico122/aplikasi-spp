<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->bigIncrements('id_siswa');
            $table->string('nama_siswa', 255);
            $table->string('id_kelas', 20);
            $table->string('nik', 50);
            $table->string('no_tlp', 20);
            $table->enum('jenis_kelamin',['Laki-Laki', 'Perempuan']);
            $table->enum('agama',['Islam', 'Protestan', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu']);
            $table->text('alamat');
            $table->date('tanggal_lahir');
            $table->string('nama_ayah', 255);
            $table->string('nama_ibu', 255);
            $table->string('pekerjaan_ayah', 120);
            $table->string('pekerjaan_ibu', 120);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
