<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->bigIncrements('id_guru');
            $table->string('nama_guru');
            $table->string('no_tlpn', 20);
            $table->string('nik', 50);
            $table->enum('jenis_kelamin',['Laki-Laki', 'Perempuan']);
            $table->enum('agama',['Islam', 'Protestan', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu']);
            $table->text('alamat');
            $table->enum('lulusan', ['S1', 'S2', 'S3', 'D1', 'D2', 'D3', 'D4']);
            $table->string('universitas', 255);
            $table->enum('Kewarganegaraan', ['WNI', 'WNA']);
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
        Schema::dropIfExists('guru');
    }
}
