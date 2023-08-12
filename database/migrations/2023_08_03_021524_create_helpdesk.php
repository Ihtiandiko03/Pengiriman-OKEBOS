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
        Schema::create('helpdesk', function (Blueprint $table) {
            $table->id();
            $table->string('no_tiket');
            $table->string('nama');
            $table->string('email');
            $table->string('status');
            $table->text('keterangan');
            $table->string('bukti_foto')->nullable();
            $table->string('teknisi')->nullable();
            $table->text('tanggapan')->nullable();
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
        Schema::dropIfExists('helpdesk');
    }
};
