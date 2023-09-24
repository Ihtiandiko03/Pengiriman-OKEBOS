<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AdminTest extends TestCase
{
    
    public function test_halaman_dashboard()
    {
        $response = $this->post('/login', [
            'email' => 'wihtiandiko@gmail.com',
            'password' => '12345',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');

        $response2 = $this->get('/dashboard');

        $response2->assertStatus(200);
    }

    public function test_halaman_admin(){
        $response = $this->post('/login', [
            'email' => 'wihtiandiko@gmail.com',
            'password' => '12345',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');

        $this->get('/dashboard/admin/agen')->assertStatus(200);
        $this->get('/dashboard/admin/driver')->assertStatus(200);
        $this->get('/dashboard/rute')->assertStatus(200);
        $this->get('/dashboard/admin/logistik')->assertStatus(200);
    }

    public function test_admin_tambah_data_agen(){
        $response = $this->post('/login', [
            'email' => 'wihtiandiko@gmail.com',
            'password' => '12345',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        
        $this->get('/dashboard/admin/agen')->assertStatus(200);

        $data = [
            'nama'        => 'AgenTest123',
            'username'    => 'AgenTest123',
            'perusahaan'       => 'AgenTest123',
            'alamat'       => 'AgenTest123',
            'email'       => 'AgenTest123@gmail.com',
            'kelurahan'       => 'AgenTest123',
            'kecamatan'       => 'AgenTest123',
            'kabupatenkota'     => 'AgenTest123',
            'provinsi'       => 'AgenTest123',
            'password'    => '12345',
            'no_telephone' => '082377102513',
            'kantor_cabang' => '3',
            'agen' => '1'
        ];

        $response2 = $this->post('/dashboard/admin/createAgen', $data);
        if($response2){
            echo "Berhasil";
        }

    }


    public function test_halaman_kurir_lihatprofil(){
        $response = $this->post('/login', [
            'email' => 'heksa@gmail.com',
            'password' => '12345',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');

        $this->get('/dashboard/profil')->assertStatus(200);
    }

}
