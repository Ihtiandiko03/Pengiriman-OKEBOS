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
        Schema::create('pengirimen', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_resi')->unique()->nullable();
            $table->float('harga')->nullable();
            $table->float('berat_barang')->nullable();
            $table->string('nama_barang')->nullable();
            $table->float('jumlah_barang')->nullable();            
            $table->string('foto_barang')->nullable();
            $table->string('foto_bukti_pembayaran')->nullable();
            $table->string('jenis_pengiriman');
            $table->foreignId('user_id');
            $table->foreignId('rute_awal');
            $table->foreignId('rute_tujuan');
            //Pengirim
            $table->string('perusahaan_pengirim');
            $table->string("nama_pengirim");
            $table->string('provinsi_pengirim');
            $table->string('kabupatenkota_pengirim');
            $table->string('kecamatan_pengirim');
            $table->string('kelurahan_pengirim');
            $table->text('alamat_pengirim');
            $table->string('kodepos_pengirim');
            $table->string('nomorhp_pengirim');
            $table->string('nomorwa_pengirim');
            //Penerima
            $table->string('perusahaan_penerima');
            $table->string("nama_penerima");
            $table->string('provinsi_penerima');
            $table->string('kabupatenkota_penerima');
            $table->string('kecamatan_penerima');
            $table->string('kelurahan_penerima');
            $table->text('alamat_penerima');
            $table->string('kodepos_penerima');
            $table->string('nomorhp_penerima');
            $table->string('nomorwa_penerima');

            //verifikasi barang
            $table->string('status');

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
        Schema::dropIfExists('pengirimen');
    }
};
