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
        Schema::create('daftar_pengiriman_kurir', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_resi');
            $table->string('nama_kurir_jemput')->nullable();
            $table->string('nama_kurir_antar')->nullable();
            $table->string('nama_penerima_barang')->nullable();
            $table->string('foto_penerimaan_barang')->nullable();
            $table->string('surat_jalan')->nullable();
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
        Schema::dropIfExists('daftar_pengiriman_kurir');
    }
};
