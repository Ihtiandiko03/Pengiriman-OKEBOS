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
        Schema::create('users', function (Blueprint $table) {
            //USER
            $table->id();
            $table->string('perusahaan')->nullable();
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            //REFFERAL
            $table->unsignedBigInteger('referrer_id')->nullable();
            $table->foreign('referrer_id')->references('id')->on('users');

            //ADMIN
            $table->boolean('admin')->default(false);

            //KURIR

            $table->boolean('kurir_antar')->default(false);
            $table->boolean('kurir_jemput')->default(false);

            //Kurir dan Agen
            $table->foreignId('kantor_cabang')->nullable();

            //Agen
            $table->boolean('agen')->default(false);

            //Logistik
            $table->boolean('logistik')->default(false);


            //ALLROLE
            $table->string('no_telephone');
            $table->text('alamat');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kabupatenkota');
            $table->string('provinsi');
            $table->float('saldo')->default(0);
            $table->boolean('is_active')->default(true);

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
