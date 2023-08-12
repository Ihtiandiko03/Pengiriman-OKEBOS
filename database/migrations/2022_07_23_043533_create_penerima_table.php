<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerima', function (Blueprint $table) {
            $table->id();
            $table->string('perusahaan');
            $table->string('nama_penerima');
            $table->string('nama_jalan');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kabupaten/kota');
            $table->string('provinsi');
            $table->string('kode_pos');
            $table->string('no_telephone');
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
        Schema::dropIfExists('penerima');
    }
};
