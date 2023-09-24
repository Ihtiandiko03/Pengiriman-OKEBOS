<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PengirimanTest extends TestCase
{
    public function test_halaman_list_pengiriman_admin()
    {
        $response = $this->post('/login', [
            'email' => 'wihtiandiko@gmail.com',
            'password' => '12345',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');

        $this->get('dashboard/admin/pengiriman')->assertStatus(200);
    }

    public function test_cetak_resi()
    {
        $response = $this->post('/login', [
            'email' => 'wihtiandiko@gmail.com',
            'password' => '12345',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');

        $this->get('dashboard/pengiriman')->assertStatus(200);
        $this->get('dashboard/pengiriman/3')->assertStatus(200);
        $this->get('dashboard/logistik/cetak_resi/85458623291124')->assertStatus(200);
    }

    public function test_cetak_resi_gagal()
    {
        $response = $this->post('/login', [
            'email' => 'wihtiandiko@gmail.com',
            'password' => '12345',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');

        $this->get('dashboard/pengiriman')->assertStatus(200);
        $this->get('dashboard/pengiriman/3')->assertStatus(200);
        $this->get('dashboard/logistik/cetak_resi/testing')->assertStatus(500);
    }

    public function test_task_kurir()
    {
        $response = $this->post('/login', [
            'email' => 'logbanjarrejo@gmail.com',
            'password' => '12345',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');

        $this->get('dashboard/logistik/penjadwalan')->assertStatus(200);
        $this->get('dashboard/logistik/penjadwalanbarang/62858789306271')->assertStatus(200);
    }

    public function test_set_task_kurir()
    {
        $response = $this->post('/login', [
            'email' => 'logbanjarrejo@gmail.com',
            'password' => '12345',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');

        $this->get('dashboard/logistik/penjadwalan')->assertStatus(200);
        $this->get('dashboard/logistik/penjadwalanbarang/62858789306271')->assertStatus(200);

        $response2 = $this->post('/dashboard/logistik/prosespenjadwalanbarang/62858789306271', [
            'nama_petugas' => 'Heksa Dananjaya',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $response2->assertStatus(200);
    }

    public function test_akses_halaman_pengiriman_untuk_kurir()
    {
        $response = $this->post('/login', [
            'email' => 'heksa@gmail.com',
            'password' => '12345',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');

        $this->get('dashboard/kurir')->assertStatus(200);
    }

    public function test_ambil_pesanan_pengiriman()
    {
        $response = $this->post('/login', [
            'email' => 'heksa@gmail.com',
            'password' => '12345',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');

        $this->get('dashboard/kurir')->assertStatus(200);
        $this->get('/dashboard/pengiriman/24352507296480/edit')->assertStatus(200);
    }

    public function test_verifikasi_penjemputan_barang()
    {
        Storage::fake('local');

        $response = $this->post('/login', [
            'email' => 'heksa@gmail.com',
            'password' => '12345',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');

        $this->get('dashboard/kurir')->assertStatus(200);
        $this->get('/dashboard/logistik/verifikasi/24352507296480')->assertStatus(200);

        $response2 = $this->post('/dashboard/logistik/prosesverifikasi/24352507296480', [
            'berat_barang' => '3000',
            'harga' => '45000',
            'foto_barang' =>  UploadedFile::fake()->image('image1.png'),
            'foto_bukti_pembayaran' =>  UploadedFile::fake()->image('image2.png')
        ]);

        $response2->assertStatus(200);
    }
}
