<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class LogistikAgenTest extends TestCase
{
    public function test_halaman_verifikasi_barang()
    {
        $response = $this->post('/login', [
            'email' => 'logbanjarrejo@gmail.com',
            'password' => '12345',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');

        $this->get('/dashboard/logistik')->assertStatus(200);

    }


    public function test_daftar_pengiriman_barang_masuk()
    {
        $response = $this->post('/login', [
            'email' => 'agenbanjarrejo@gmail.com',
            'password' => '12345',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');

        $this->get('/dashboard/agen')->assertStatus(200);
        $this->get('/dashboard/logistik/lihatdetailpengiriman/9')->assertStatus(200);
    }

    public function test_penjadwalan_barang_antar_kota(){
        Storage::fake('local');

        $response = $this->post('/login', [
            'email' => 'logbanjarrejo@gmail.com',
            'password' => '12345',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');

        $this->get('/dashboard/logistik/penjadwalan')->assertStatus(200);
        $this->get('/dashboard/logistik/penjadwalanbarangantarkota/71001009889866')->assertStatus(200);


        $response2 = $this->post('/dashboard/logistik/prosespenjadwalanbarangantarkota/71001009889866', [
            'nama_petugas' => 'Agen Sukarame',
            'updated_at' => date('Y-m-d H:i:s'),
            'surat_jalan' =>  UploadedFile::fake()->image('image1.png'),
        ]);

        $response2->assertStatus(200);
    }


}
